<?php

namespace Syntaxseed\Libsodiumfacade;

/**
 * Wrapper/Facade class for LibSodium Symmetric and PublicKey Encryption.
 * Binary data encoded as hex for convenience.
 * Functions expect hex input parameters.
  * @author Sherri Wheeler
  * @version  1.0.3
  * @copyright Copyright (c) 2022, Sherri Wheeler - syntaxseed.com
  * @license MIT
 */

class LibsodiumFacade
{
    // *********** Symmetric Encryption Functions *************

    /**
     * Generate a new random shared key for symmetric encryption.
     * Keep this key secret.
     *
     * @return string
     */
    public static function generateSymmetricKey()
    {
        return bin2hex(random_bytes(SODIUM_CRYPTO_SECRETBOX_KEYBYTES));
    }

    /**
     * Symmetric (shared) key encryption.
     * Returns an array with nonce, and result.
     *
     * @param string $secretString
     * @return array
     */
    public static function symmetricEncrypt($secretString, $symmetricKey)
    {
        // Create a random nonce.
        $nonce = random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);

        // Use supplied symmetic key.
        $key = hex2bin($symmetricKey);

        // Encrypted result.
        $encrypted = bin2hex(
            sodium_crypto_secretbox($secretString, $nonce, $key)
        );

        return [
            'nonce' => bin2hex($nonce),
            'encrypted' => $encrypted
        ];
    }

    /**
     * Symmetic (shared) key decryption.
     * Returns the decrypted result.
     *
     * @param string $nonce
     * @param string $key
     * @param string $encryptedString
     * @return string
     */
    public static function symmetricDecrypt($encryptedString, $nonce, $key)
    {
        // Decrypt our message.
        $plaintext = sodium_crypto_secretbox_open(
            hex2bin($encryptedString),
            hex2bin($nonce),
            hex2bin($key)
        );
        return $plaintext;
    }

    // *********** Public-Key Encryption Functions *************

    /**
     * Generate a new random public and private pair of keys.
     * Keep the private key secret.
     *
     * @return array
     */
    public static function generateKeyPair()
    {
        $keyPair = sodium_crypto_box_keypair();

        $private = bin2hex(sodium_crypto_box_secretkey($keyPair));
        $public = bin2hex(sodium_crypto_box_publickey($keyPair));

        return compact('public', 'private');
    }

    /**
     * Public key encryption.
     * Key pair must already have been generated.
     * Returns an array with nonce, result.
     *
     * @param string $secretString
     * @return array
     */
    public static function publicKeyEncrypt($secretString, $theirPublicKey, $ourPrivateKey)
    {
        // Create a random nonce.
        $nonce = random_bytes(SODIUM_CRYPTO_BOX_NONCEBYTES);

        // Use supplied key pair.
        $privateKey = hex2bin($ourPrivateKey);
        $publicKey = hex2bin($theirPublicKey);
        $key = sodium_crypto_box_keypair_from_secretkey_and_publickey($privateKey, $publicKey);

        // Encrypted result.
        $encrypted = bin2hex(
            sodium_crypto_box(
                $secretString,
                $nonce,
                $key
            )
        );

        return [
            'nonce' => bin2hex($nonce),
            'encrypted' => $encrypted
        ];
    }

    /**
     * Public key decryption.
     * Returns the decrypted result.
     *
     * @param string $nonce
     * @param string $key
     * @param string $encryptedString
     * @return string
     */
    public static function publicKeyDecrypt($encryptedString, $nonce, $ourPublicKey, $theirPrivateKey)
    {
        // Combine keys into a keypair.
        $key = sodium_crypto_box_keypair_from_secretkey_and_publickey(hex2bin($theirPrivateKey), hex2bin($ourPublicKey));

        // Decrypt message.
        $plaintext = sodium_crypto_box_open(
            hex2bin($encryptedString),
            hex2bin($nonce),
            $key
        );
        return $plaintext;
    }
}
