<?php
// FTP server details
$ftp_server = "";
$ftp_username = "";
$ftp_password = "";

// Remote and local file paths
$remote_files = [
    "data/contohfile.xlsx"
];
$local_files = [
    "C:/Data/contohfile.xlsx"
];

// Establishing an FTP connection
$conn_id = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");

// Logging in with username and password
if (@ftp_login($conn_id, $ftp_username, $ftp_password)) {
    echo "Connected as $ftp_username@$ftp_server\n";
} else {
    echo "Could not connect as $ftp_username\n";
    exit;
}

// Enabling passive mode
ftp_pasv($conn_id, true);

// Uploading the files
for ($i = 0; $i < count($remote_files); $i++) {
    if (ftp_put($conn_id, $remote_files[$i], $local_files[$i], FTP_BINARY)) {
        echo "Successfully uploaded {$local_files[$i]} to {$remote_files[$i]}\n";
    } else {
        echo "There was a problem while uploading {$local_files[$i]} to {$remote_files[$i]}\n";
    }
}

// Closing the FTP connection
ftp_close($conn_id);
?>
