<?php
/**
* @package		Formatting Dec IonCube V4
* @copyright	Copyright 2009-2011 DeZender
* @license		http://www.gnu.org/licenses/agpl.html GNU/GPL
* @version		$Id: Formatting_Dec_IonCube_V4.php 1 01-05-2011 00:00:00Z DeZender $
* @since		1.0.0
*/

	define( 'DS', DIRECTORY_SEPARATOR );
	define( 'BASE', dirname( __FILE__ ) . DS . '02-decoded' );
	define( 'DEBUG', false );

	function find_all_files($dir) {
		$root = scandir( $dir );
		$result = array(  );

		foreach ($root as $value) {
			$path = $dir . DS . $value;

			if ($value == '.' || $value == '..') {
				continue;
			}

			if (is_file( $path )) {
				$path_parts = pathinfo( $path );

				if (isset( $path_parts['extension'] ) && $path_parts['extension'] == 'php') {
					$result[] = $path;
				}

				continue;
			}

			foreach (find_all_files( $path ) as $value) {
				$result[] = $value;
			}
		}

		return $result;
	}

	$files = find_all_files( BASE );
	$files_count = count( $files );

	if ($files_count > 0) {
		for ($files_i = 0, $files_n = $files_count; $files_i < $files_n; $files_i++) {
			$source_filename = $files[$files_i];
			$destination_filename = preg_replace( '#.php$#', '_de.php', $source_filename );
			$source = file( $source_filename );

			for ($i = 0, $n = count( $source ); $i < $n; $i++) {
				if (isset( $source[$i] )) {
					$line = $source[$i];

					// Fix String
					$line_search = array(
						'#\', \'\\\\\'#',
						'#\'\\\\\', \'#',
						'# =  \. #',
						'#\(  \. #',
						'#,  \. #',
						'# \?  \. #',
						'# :  \. #',
						'#echo  \. #'
					);

					$line_replace = array(
						'\', \'\\\\\\\'',
						'\'\\\\\\\', \'',
						' = ',
						'( ',
						', ',
						' ? ',
						' : ',
						'echo '
					);

					$fix_string = preg_replace(
						$line_search,
						$line_replace,
						$source[$i]
					);

					$source[$i] = $fix_string;

					// Detect NEW Class
					if (preg_match( '#^new \((.*)\);#', trim( $line ) )) {
						if (preg_match( '#(.*) = ;$#', trim( $source[$i + 1] ), $matches )) {
							if (count( $matches ) == 2) {
								$variable_name = $matches[1];

								if (preg_match( '#(.*);#', trim( $source[$i - 1] ), $matches )) {
									$function_name = $matches[1];

									$new_line = preg_replace(
										'#new \((.*)\);#',
										sprintf( '%s = new %s(\1);', $variable_name, $function_name ),
										$line
									);

									$source[$i] = $new_line;

									unset( $source[$i - 1] );
									unset( $source[$i + 1] );
								}
							}
						}

					// Detect foreach
					} else if (preg_match( '#^foreach \(#', trim( $line ) )) {
						$is_value_foreach = false;
						$value_foreach = false;
						$is_key_foreach = false;
						$key_foreach = false;

						if (preg_match( '#^\[0\];#', trim( $source[$i + 1] ) )) {
							$is_value_foreach = 1;

							if (preg_match( '#^\[1\];#', trim( $source[$i + 2] ) )) {
								$is_key_foreach = 1;
							}
						} else if (preg_match( '#(.*) = ;$#', trim( $source[$i + 1] ) )) {
							$is_value_foreach = 2;

							if (preg_match( '#(.*) = ;$#', trim( $source[$i + 2] ) )) {
								$is_key_foreach = 2;
							}
						}

						if ($is_value_foreach && preg_match(
							'#(.*) = ;$#',
							($is_value_foreach == 2 ? trim( $source[$i + 1] ) : trim( ($is_key_foreach ? $source[$i + 3] : $source[$i + 2]) )),
						$matches )) {
							$value_foreach = (count( $matches ) == 2 ? $matches[1] : false);

							if ($is_key_foreach && preg_match(
								'#(.*) = ;$#',
								($is_key_foreach == 2 ? trim( $source[$i + 2] ) : trim( $source[$i + 4] )),
							$matches )) {
								$key_foreach = (count( $matches ) == 2 ? $matches[1] : false);
							}

							$new_line = preg_replace(
								'#foreach \((.*) as \) {#',
								sprintf( 'foreach (\1 as %s) {', ($is_key_foreach && $key_foreach ? $key_foreach . ' => ' . $value_foreach : $value_foreach) ),
								$line
							);

							$source[$i] = $new_line;

							unset( $source[$i + 1] );

							if ($is_value_foreach == 1 || $is_key_foreach == 2) {
								unset( $source[$i + 2] );
							}

							if ($is_key_foreach == 1 && $key_foreach) {
								unset( $source[$i + 3] );
								unset( $source[$i + 4] );
							}
						}
					} else if (preg_match( '#if (.*)\$(.*) = \)#', $line ) && isset( $source[$i - 2] )) {
						$line_befor = trim( $source[$i - 2] );
						$new_line_befor = preg_replace( '#;$#', '', $line_befor);
						$source[$i] = preg_replace(
							'#if (.*)\$(.*) = \)#',
							sprintf( 'if \1$\2 = %s)', $new_line_befor ),
							$line
						);

						unset( $source[$i - 2] );
					} else if (preg_match( '#= ;$#', $line )) {
						$line_befor = false;

						if (isset( $source[$i - 1] )) {
							$line_befor = trim( $source[$i - 1] );
						}

						if (isset( $source[$i - 2] ) && preg_match( '#\'$#', trim( $source[$i - 2] ) )) {
							$build_value = $source[$i - 2];

							for ($i_build_value = $i - 3, $n_build_value = 0; $i_build_value >= $n_build_value; $i_build_value--) {
								if (isset( $source[$i_build_value] ) && preg_match( '#\'$#', trim( $source[$i_build_value] ) )) {
									$build_value .= $source[$i_build_value];

									unset( $source[$i_build_value] );

								} else {
									$build_value .= sprintf( "%s\n", $line_befor );

									$new_line = preg_replace( '#;$#', ltrim( $build_value ), $line );
									$source[$i] = $new_line;

									unset( $source[$i - 1] );
									unset( $source[$i - 2] );

									break;
								}
							}
						} else if (preg_match( '#[a-z]\(|^\$\w#i', $line_befor )) {
							$new_line_befor = preg_replace( '#;$#', '', $line_befor);
							$new_line = preg_replace( '#;$#', $new_line_befor . ';', $line );
							$source[$i] = $new_line;
							unset( $source[$i - 1] );
						} else {
						//	echo $line_befor . '<br />';
						}
					}
				}
			}

			$destination = implode( '', $source );

			if (DEBUG) {
				highlight_string( $destination );
			} else {
				file_put_contents( $destination_filename, $destination );
			}
		}
	}

?>