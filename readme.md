# Reverse Proxy PHP Issue Demonstration

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