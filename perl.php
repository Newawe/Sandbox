<?php
    $sUrl = 'http://rextester.com/rundotnet/Run';
    $params = array('http' => array(
        'method' => 'POST',
        'content' => 'Program='.$_GET["code"].'&LanguageChoiceWrapper=13'
    ));
    $ctx = stream_context_create($params);
    $fp = @fopen($sUrl, 'rb', false, $ctx);
    if (!$fp)
    {
        throw new Exception("Problem with $sUrl, $php_errormsg");
    }
    $response = @stream_get_contents($fp);
    if ($response === false)
    {
        throw new Exception("Problem reading data from $sUrl, $php_errormsg");
    }
$obj = json_decode($response);
if(!$obj->{'Errors'}) {
    echo $obj->{'Result'};
}else{
    echo $obj->{'Errors'};
}
?>
