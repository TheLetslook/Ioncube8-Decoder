<?php
/*
* @ Ioncube php fixer
* @ Website: Deioncube.me
*/

	define( 'DS', DIRECTORY_SEPARATOR );
	define( 'BASE', dirname( __FILE__ ) . DS . '../decoded' );
	define( 'DEBUG', false );
    $php_file= $argv[1];
    $php_file_out= $argv[2];
    //     echo $php_file;
	function find_all_files($php_file) {
		

		return $result;
	}

//	$files = find_all_files( BASE );
	//$files_count = count( $files );
			$source_filename = $php_file;
			$destination_filename = preg_replace( '#.php$#', '.php', $php_file_out );
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
						$source[$i]);
					
					$fix_string = str_replace("'' . '", "'", $fix_string);
					$fix_string = str_replace(", '\'", ", '\\\\'", $fix_string);
					$fix_string = str_replace("!= '\'", "!= '\\\\'", $fix_string);
					$fix_string = str_replace("\$i = 721;", "\$i = 0;", $fix_string);
					$fix_string = str_replace("\$i = 236;", "\$i = 0;", $fix_string);
					$fix_string = str_replace("\$i = 91;", "\$i = 1;", $fix_string);
					$fix_string = str_replace("\$i = 91;", "\$i = 1;", $fix_string);
					$fix_string = str_replace("\$slots = 274;", "\$slots = 0;", $fix_string);
					$fix_string = str_replace("\$x = 1058;", "\$x = 0;", $fix_string);
					$fix_string = str_replace("\$x = 996;", "\$x = 0;", $fix_string);
					$fix_string = str_replace("\$i = 996;", "\$i = 0;", $fix_string);
					$fix_string = str_replace("\$vName = if (preg_match", "/*\$vName = */  if (preg_match", $fix_string);
					$fix_string = str_replace("', \$vTmp[\$i + 1]", "\\\nn', \$vTmp[\$i + 1]", $fix_string);
					$fix_string = str_replace("\$vTmp2 = trim( \$vMat[1]", "\$vName = trim( \$vMat[1]", $fix_string);
					$fix_string = str_replace("\$s = \$s = phpinfo( INFO_MODULES );", "phpinfo( INFO_MODULES );", $fix_string);
					$fix_string = str_replace("preg_replace( '/<td[^>]*>([^<]+", "\$s = preg_replace( '/<td[^>]*>([^<]+", $fix_string);
					$fix_string = str_replace("preg_replace( '/<th[^>]*>([^<]+", "\$s = preg_replace( '/<th[^>]*>([^<]+", $fix_string);
					$fix_string = str_replace("strip_tags( \$s, ", "\$s = strip_tags( \$s, ", $fix_string);
					$fix_string = str_replace("\$s = ob_end_clean(  );", "ob_end_clean(  );", $fix_string);
					$fix_string = str_replace("if (\$dotpos =  === false)", "if ( \$dotpos === false)", $fix_string);
					$fix_string = str_replace("\$arr_keys = ;", "while (list( \$arr_keys, \$arr_values ) = each( \$sort_values )) {", $fix_string);
					$fix_string = str_replace("'/\'", "'/\\\\'", $fix_string);
					$fix_string = str_replace("\$i = 282;", "\$i = 0;", $fix_string);
					$fix_string = str_replace("each( \$process )[1];", "while (list(\$key, \$val) = each(\$process)) {", $fix_string);
					$fix_string = str_replace("\$i = 347;", "\$i = 0;", $fix_string);
					$fix_string = str_replace("\$factor2 = 339;", "\$factor2 = 0;", $fix_string);
					$fix_string = str_replace("\$i = 339;", "\$i = 0;", $fix_string);
					$fix_string = str_replace("\$factor2 = 347;", "\$factor2 = 0;", $fix_string);
					$fix_string = str_replace("\$target = split( ' -> ', \$regs[7] )[1];", "list(\$regs[7], \$target) = split(' -> ', \$regs[7]);", $fix_string);
					$fix_string = str_replace("\$tot = 282;", "\$tot = 0;", $fix_string);
					$fix_string = str_replace("(' . \$char1 . ')';", "(\$char1)';", $fix_string);
					$fix_string = str_replace("(' . \$char2 . ')';", "(\$char2)';", $fix_string);
					$fix_string = str_replace("(' . \$char . ')';", "(\$char)';", $fix_string);
					$fix_string = str_replace("\$adj = ;", "\$adj = \$this->_applyFudgeFactor(\$fudgefactor);", $fix_string);
					$fix_string = str_replace("\$num1 = ;", "\$num1 = strpos( \$this->scramble1, \$char1 );", $fix_string);
					$fix_string = str_replace("str_replace( '&amp;', '&', \$postdata );", "\$postdata = str_replace( '&amp;', '&', \$postdata );", $fix_string);
					$fix_string = str_replace("@floor( @log( \$size, 1024 ) );", "", $fix_string);
					$fix_string = str_replace("return @round( \$size / @pow( 1024, \$i =  ), 2 ) . ' ' . \$unit[\$i];", "return round( @\$size / @pow( 1024, @\$i = @floor( @log( @\$size, 1024 ) ) ), 2 ).' '.\$unit[\$i];", $fix_string);
					$fix_string = str_replace("return round( @\$size / @pow( 1024, @\$Var_240 ), 2 ).\" \".\$unit[\$i];", "return round( @\$size / @pow( 1024, @\$i = @floor( @log( @\$size, 1024 ) ) ), 2 ).\" \".\$unit[\$i];", $fix_string);
					$fix_string = str_replace("'\' ))", "'\\\\' ))", $fix_string);
					$fix_string = str_replace(". '\updates\'", ". '\\\\updates\\\\'", $fix_string);
					$fix_string = str_replace("'/^(\.+\/*)+$/'", "\"/^(\.+\/*)+$/\"", $fix_string);
					$fix_string = str_replace("if (\$data = mysql_fetch_array", "while (\$data = mysql_fetch_array", $fix_string);
					$fix_string = str_replace("if (\$row = mysql_fetch_array", "while (\$row = mysql_fetch_array", $fix_string);
					$fix_string = str_replace("if (\$row = mysql_fetch_assoc", "while (\$row = mysql_fetch_assoc", $fix_string);
					$fix_string = str_replace("if (\$data = mysql_fetch_assoc", "while (\$data = mysql_fetch_assoc", $fix_string);
					$fix_string = str_replace("srand( ( double ) * 1000000 );", "srand( (double)microtime(  ) * 1000000 );", $fix_string);
					
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

						}
					}
				}
			}

			$destination = implode( '', $source );

			if (DEBUG) {
				highlight_string( $destination );
			} else {
  //              echo $destination_filename;
			//	file_put_contents( $destination_filename, $destination );
             $file = fopen("$destination_filename","w+");
fwrite($file,"$destination");
fclose($file);
			}
	

?>