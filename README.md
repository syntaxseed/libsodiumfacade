Libsodium Facade
=========================

A wrapper/facade class for PHP's LibSodium extension. Providing symmetric and public key encryption and decryption static methods, and key generation methods.

Hex-encoded: All output converted to hex. Inputs expect hex-encoded values.

* Licence: MIT
* Author: Sherri Wheeler sherri.syntaxseed@ofitall.com
* Packagist: https://packagist.org/packages/syntaxseed/libsodium

Install
--------

Via Composer:
```
composer require syntaxseed/libsodium
```

Or add to composer.json:
```
"require": {
    "syntaxseed/libsodium": "1.*"
},
```

Static Functions
--------

* Symmetric Encryption (one secret key)
   * generateSymmetricKey()
   * symmetricEncrypt($secretString, $symmetricKey)
   * symmetricDecrypt($encryptedString, $nonce, $key)

* Public-Key Encryption (public/private key pair)
   * generateKeyPair()
   * publicKeyEncrypt($secretString, $theirPublicKey, $ourPrivateKey)
   * publicKeyDecrypt($encryptedString, $nonce, $ourPublicKey, $theirPrivateKey)

Usage
--------

See `examples/` directory.

Changelog
--------

* v1.0.0 - Created. Added to GitHub.
  * v1.0.1 - Update readme, add Composer instructions.
  * v1.0.2 - Test for PHP 8. Add example usage file.
