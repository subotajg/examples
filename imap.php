<?php 

/*
In order to work with GMAIL
Login to your gmail account, enable imap.
Let the access here first: https://www.google.com/settings/security/lesssecureapps
Go to: https://accounts.google.com/b/0/DisplayUnlockCaptcha and enable access.

good library https://github.com/ddeboer/imap
*/

$imap_host = 'imap.gmail.com:993/imap/ssl';
$imap_folder = 'INBOX';
$imap_user = "some_email@gmail.com";
$imap_pass = "some_password";

$mbox = imap_open('{' . $imap_host . '}' . $imap_folder, $imap_user, $imap_pass);
if(!$mbox){
    var_dump(imap_errors());
    exit(-1);
}

$count = imap_num_msg($mbox);
echo "Current inbox has $count messages\n";

$header	= imap_headerinfo($mbox, $count);
$raw	= imap_body($mbox, $count);
echo "Message #$count:\n";
echo "Date: " . $header->date . "\n";
echo "From: " . $header->fromaddress . "\n";
echo "Subject: " . $header->subject . "\n";

echo "RAW: \n" . $raw . "\n\n";
