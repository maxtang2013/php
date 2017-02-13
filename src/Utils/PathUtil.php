<?php
   class PathUtil {
        public static function getRelativePath($from, $to) {
            $i = 0;
            $len1 = strlen($from);
            $len2 = strlen($to);

            while ($i < $len1 && $i < $len2) {
                if ( $from[$i] != $to[$i] ) {
                    break;
                }
                ++$i;
            }
            $suffix = substr($to, $i);

            $result = "";
            while ($i < $len1) {
                if ($from[$i] == '/') {
                    $result .= '../';
                }
                ++$i;
            }

            $result .= $suffix;
            return $result;
        }
    

        public static function getRelativePath2($basePath, $targetPath)
        {
            if ($basePath === $targetPath) {
                return '';
            }

            $sourceDirs = explode('/', isset($basePath[0]) && '/' === $basePath[0] ? substr($basePath, 1) : $basePath);
            $targetDirs = explode('/', isset($targetPath[0]) && '/' === $targetPath[0] ? substr($targetPath, 1) : $targetPath);
            array_pop($sourceDirs);
            $targetFile = array_pop($targetDirs);

            foreach ($sourceDirs as $i => $dir) {
                if (isset($targetDirs[$i]) && $dir === $targetDirs[$i]) {
                    unset($sourceDirs[$i], $targetDirs[$i]);
                } else {
                    break;
                }
            }

            $targetDirs[] = $targetFile;
            $path = str_repeat('../', count($sourceDirs)).implode('/', $targetDirs);

            // A reference to the same base directory or an empty subdirectory must be prefixed with "./".
            // This also applies to a segment with a colon character (e.g., "file:colon") that cannot be used
            // as the first segment of a relative-path reference, as it would be mistaken for a scheme name
            // (see http://tools.ietf.org/html/rfc3986#section-4.2).
            return '' === $path || '/' === $path[0]
                || false !== ($colonPos = strpos($path, ':')) && ($colonPos < ($slashPos = strpos($path, '/')) || false === $slashPos)
                ? "./$path" : $path;
        }
    }



    $a = '/a/b/c/d/e.php';
    $b = '/a/b/12/34/c.php';

    echo strpos($a, ':');
    echo '<br/>';

    echo strpos($a, 'c');
    echo '<br/>';

    echo "$a <br/>";

    $dirs = explode('/', $a);
    print_r($dirs);

    echo $a[0];
    echo "<br/>";

    echo PathUtil::getRelativePath2($a,$b);
?>
