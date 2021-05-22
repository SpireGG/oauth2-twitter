Twitter provider for league/oauth2-client
=========================================

This is a package to integrate Twitter authentication with the [OAuth2 client library](https://github.com/thephpleague/oauth2-client) by
[The League of Extraordinary Packages](http://thephpleague.com).

To install, use composer:

```bash
composer require spiregg/oauth2-twitter
```

Usage is the same as the league's OAuth client, using `\SpireGG\OAuth2\Client\Provider\Twitter` as the provider.
For example:

```php
$provider = new SpireGG\OAuth2\Client\Provider\Twitter([
    'clientId' => "YOUR_CLIENT_ID",
    'clientSecret' => "YOUR_CLIENT_SECRET",
    'redirectUri' => "http://your-redirect-uri"
]);
```

You can also optionally add a `scopes` key to the array passed to the constructor. The available scopes are documented
on the [Twitter API Documentation](https://developer.twitter.com/en/docs/authentication/oauth-2-0).

> Note: The provider uses the "user_read" scope by default. If you pass other scopes, and want the ->getResourceOwner() method
to work, you will need to ensure the "user_read" scope is used.

```php
if (isset($_GET['code']) && $_GET['code']) {
    $token = $this->provider->getAccessToken("authorization_code", [
        'code' => $_GET['code']
    ]);

    // Returns an instance of SpireGG\OAuth2\Client\Provider\TwitterResourceOwner
    $user = $this->provider->getResourceOwner($token);
    
    $user->getDisplayName();
    $user->getId();
    $user->getType();
    $user->getBio();
    $user->getEmail();
    $user->getPartnered();
```

Testing
---------
You can quickly test that the package works by adding client information (from your twitter.tv account) to `config/config.php`
and then starting up a php server

```bash
cd test/
php -S localhost:8000
```

Now, navigating to `http://localhost:8000` should present an OAuth flow and then dump your user information.
