<?php
require 'function.php';

$ID = $_GET["id"];
if( hapus($ID) > 0) {
    echo "
    <script>
        alert('data berhasil dihapus!');
        document.location.href = 'index.php';
    </script>
    ";
}else{
    echo "
    <script>
        alert('data tidak berhasil dihapus!');
        document.location.href = 'index.php';
    </script>
    ";
}
?>