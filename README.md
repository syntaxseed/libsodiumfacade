Libsodium Facade
=========================

<div align="center">
    <img src="https://img.shields.io/github/tag/syntaxseed/libsodiumfacade.svg" alt="GitHub tag (latest SemVer)">&nbsp;&nbsp;
    <img src="https://img.shields.io/badge/PHP-7.2+-brightgreen.svg" alt="PHP v7.2+">&nbsp;&nbsp;
    <img src="https://img.shields.io/badge/PHP-8.0+-brightgreen.svg" alt="PHP v8.0+">&nbsp;&nbsp;
    <img src="https://img.shields.io/github/license/syntaxseed/templateseed" alt="License: MIT"><br>
    <a href="https://twitter.com/intent/follow?screen_name=syntaxseed"><img src="https://img.shields.io/twitter/follow/syntaxseed.svg?style=social&logo=twitter" alt="follow on Twitter"></a>&nbsp;&nbsp;<a href="https://github.com/syntaxseed#donatecontribute"><img src="https://img.shields.io/badge/Sponsor-Project-blue" alt="Sponsor Project" /></a>
</div>

A wrapper/facade class for PHP's LibSodium extension. Providing symmetric and public key encryption and decryption static methods, and key generation methods.

Hex-encoded: All output converted to hex. Inputs expect hex-encoded values.

* Licence: MIT
* PHP Versions: 7.2+, 8.0+.
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
