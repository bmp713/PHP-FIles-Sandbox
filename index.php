<!DOCTYPE html>
<html>
<head>
<title>
PHP | Files Sandbox
</title>
</head>
<body>
<!-- Practice with forms and PHP file reading and writing -->
    <div id="wrapper">
        <div id="content">
            <div id="content_1">
                PHP | Files Sandbox<br><br>
                <form action="index.php" method="POST">
            		User Name
                    <input type="text" name="name" value="Steve" placeholder="Name"><br>
        			Password 
                    <input type="password" name="pswd" value="Password" placeholder="Password"><br>
       				<button type="submit">
                    Submit
                    </button>
   				</form><br>
                <?php
                    // Delete file
                    unlink('file.txt');

                    // Create file
                    touch('file.txt');

                    // Print basename
                    $path = '/var/www/html/PHP/Files/file.txt';
                    echo 'basename('.'"'.$path.'"'.') = '.basename($path).'<br><br>';

                    // Open file and write POST input, copy file to parent directory
                    $file = fopen("/var/www/html/PHP/Files/file.txt","w");
                    fwrite( $file, "Data written to file\n");
                    fwrite( $file, $_POST['name']."\n");
                    fwrite( $file, $_POST['pswd']."\n");
                    fclose( $file );
                    copy("file.txt", "../file.txt");

                    // Print each line of file
                    if( file_exists("../file.txt") ){
                        $file = fopen("../file.txt", "r");

                        while( $line = fgets( $file ) ){
                            echo $line.'<br>';
                            $buffer = $line;
                        }
                        fclose( $file );
                    }
                    echo '<br>';

                    // Print length of each line from file
                    $file = fopen('../file.txt', 'r');
                    while( $line = fgets( $file ) ){
                        echo 'strlen('.'"'.$line.'"'.') = '.strlen($line).'<br>';
                    }
                    fclose( $file );
                    echo '<br><br>';


                    // Copy contents of file to array by line
                    $array = file("file.txt");
                    print_r( $array );
                    echo '<br><br>';

                    // Print length of each line of array
                    for( $n = 0; $n < sizeof($array); $n++ ){
                        echo 'array['.$n.'] length = '.strlen( $array[$n] ).'<br>';
                    }
                    echo '<br>';

                    // Print each line of array separately
                    for( $n = 0; $n < sizeof($array); $n++){
                        echo 'array['.$n.'] ='.$array[$n].'<br>';
                    }
                    fclose( $file );
                    echo '<br>';

                    // String to array
                    $str = 'one, two, three, four';
                    $exploded = explode(',', $str );
                    echo 'explode('.'"'.$str.'"'.') = ';
                    print_r( $exploded );
                    echo '<br><br>';

                    // Array to string
                    $imploded = implode( $exploded );
                    echo 'implode('.'"'.$exploded.'"'.') = ';
                    echo '"'.$imploded.'"'.'<br><br>';
                    echo 'strlen('.'"'.$imploded.'"'.') = '.strlen( $imploded );

                    // String concatenation
                    $str = 'INLINE '; 
                    $file = fopen("../file.txt", "r");
                    while( $line = fgets( $file ) ){
                        $line = $_POST['pswd'].$line.$_POST['pswd'];
                        echo 'Line = '.$line.'<br><br>';
                    }
                ?>
            </div>
        </div>
    </div>

</body>
</html>

