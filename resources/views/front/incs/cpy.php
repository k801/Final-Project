<?PHP
$PATH=__DIR__."dinnerclub/img/";
$ext="png";
$start=1;
$end=20;
for( $i=$start;$i<=$end;$i++)
{

    copy("$path/$i".$ext,"$path/$i.$ext");
    
}

?>