# Reverse Proxy PHP Issue Demonstration

This repo contains code to demonstrate an issue where a healthcheck returns slowly because of code in other places taking a long time.

slow.php connects via curl to a local HTTP server and makes a request that intentionally doesn't return for 5s.

[The `load` service in the `Dockerfile`](https://github.com/trea/php-fpm-issue/blob/74296b4314c8976041a8970b7e4875880f5c9a70/docker-compose.yaml#L21) generates a load on the slow.php file.

Eventually the load created overwhelms the PHP-FPM workers and subsequent requests to the healthcheck at `health.php` fail to respond within the 3 second timeframe of the reverse proxy.

```sh
docker-compose up
```

New tab/window:

```sh
time docker-compose run --rm healthcheck
```

Should see healthcheck return "ok" < 1s


Generate fake load:

```sh
docker-compose run --rm -d load
```

```sh
time docker-compose run --rm healthcheck
```

Should see healthcheck return > 3s