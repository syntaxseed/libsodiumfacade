Libsodium Facade
=========================

<div align="center">
    <img src="https://img.shields.io/github/tag/syntaxseed/libsodiumfacade.svg" alt="GitHub tag (latest SemVer)">&nbsp;&nbsp;
    <img src="https://img.shields.io/badge/PHP-8.0+-brightgreen.svg" alt="PHP v8.0+">&nbsp;&nbsp;
    <img src="https://img.shields.io/badge/PHP-8.1+-brightgreen.svg" alt="PHP v8.1+">&nbsp;&nbsp;
    <img src="https://img.shields.io/github/license/syntaxseed/templateseed" alt="License: MIT"><br>
    <a href="https://twitter.com/intent/follow?screen_name=syntaxseed"><img src="https://img.shields.io/twitter/follow/syntaxseed.svg?style=social&logo=twitter" alt="follow on Twitter"></a>&nbsp;&nbsp;<a href="https://github.com/syntaxseed#donatecontribute"><img src="https://img.shields.io/badge/Sponsor-Project-blue" alt="Sponsor Project" /></a>
</div>

A wrapper/facade class for PHP's LibSodium extension. Providing symmetric and public key encryption and decryption static methods, and key generation methods.

Hex-encoded: All output converted to hex. Inputs expect hex-encoded values.

* Licence: MIT
* Version: 1.0.4
* PHP Versions: 8.0+, 8.1+, 8.2+, 8.3+.
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
    "syntaxseed/libsodium": "^1.0"
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

* v1.0.0 - (2018-10-27) Created. Added to GitHub.
  * v1.0.1 - (2018-10-27) Update readme, add Composer instructions.
  * v1.0.2 - (2022-02-02) Test for PHP 8.0. Add example usage file.
  * v1.0.3 - (2022-03-13) Test for PHP 8.1. Fix PSR formatting.
  * v1.0.4 - (2024-12-18) Test for PHP 8.3.