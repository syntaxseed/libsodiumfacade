<?php

/**
 * Example usage for public key encryption.
 * Both parties need a pair of keys. One public they share with the other party.
 * One private they keep to themself.
 */

use Syntaxseed\Libsodiumfacade\LibsodiumFacade;

require('../src/LibsodiumFacade.php');

$secretMessage = "I want to encrypt this content.";

$myKeyPair = LibsodiumFacade::generateKeyPair();
$theirKeyPair = LibsodiumFacade::generateKeyPair();

$encryptedMessage = LibsodiumFacade::publicKeyEncrypt(
    $secretMessage,
    $theirKeyPair['public'],
    $myKeyPair['private']
);

$decryptedMessage = LibsodiumFacade::publicKeyDecrypt(
    $encryptedMessage['encrypted'],
    $encryptedMessage['nonce'],
    $myKeyPair['public'],
    $theirKeyPair['private']
);

echo("<pre>\n\n");

echo("==== PUBLIC KEY ENCRYPTION ====\n\n");

echo("Original Message: \n");
print_r($secretMessage);
echo("\n\n");

echo("Encrypted Message: \n");
print_r($encryptedMessage);
echo("\n\n");

echo("Decrypted Message: \n");
print_r($decryptedMessage);
echo("\n\n");
