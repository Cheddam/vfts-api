# VFTS API

A simple SilverStripe-based API which powers [a demo Nuxt app](https://github.com/Cheddam/vues-from-the-server).

## Installation

This project comes with a Docker Compose configuration, which will spin up
a functional development environment. Simply run `docker-compose up` to
start it.

Alternatively, you can run this on pretty muh any *nix server with PHP ~5.6 and MariaDB / MySQL.

## Usage

Take a look in the `app/` directory to get an idea of the available endpoints.
There is also a ModelAdmin to allow manual tinkering with the different models
(useful for setting up boards and threads as there are no endpoints for making
them yet).

## Disclaimer

In order to support running the Nuxt app on a separate domain, the API returns
a CORS header that allows any domain to access it. This is a serious security
issue, so although I'm certain no-one will deploy this to a production
environment, I must state that _you should not deploy this to a production
environment_.
