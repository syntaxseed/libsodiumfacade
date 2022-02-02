<?php
/**
 * Example usage for symmetric key encryption.
 * One key is used to both encrypt and decrypt.
 */

use Syntaxseed\Libsodiumfacade\LibsodiumFacade;

require('../src/LibsodiumFacade.php');

$secretMessage = "I want to encrypt this content.";

$key = LibsodiumFacade::generateSymmetricKey();

$encryptedMessage = LibsodiumFacade::symmetricEncrypt($secretMessage, $key);

$decryptedMessage = LibsodiumFacade::symmetricDecrypt(
    $encryptedMessage['encrypted'],
    $encryptedMessage['nonce'],
    $key
);

echo("<pre>\n\n");

echo("==== SYMMETRIC KEY ENCRYPTION ====\n\n");

echo("Original Message: \n");
print_r($secretMessage);
echo ("\n\n");

echo ("Encrypted Message: \n");
print_r($encryptedMessage);
echo ("\n\n");

echo ("Decrypted Message: \n");
print_r($decryptedMessage);
echo ("\n\n");
