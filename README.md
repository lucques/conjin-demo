# Conjin Demo

This website contains a demo of a [conjin project](https://github.com/lucques/conjin). You can visit the deployed version here: [https://lukas.convnet.de/conjin-demo/](https://lukas.convnet.de/conjin-demo/). The goal is to demonstrate as many features and modules as possible, each as isolated as possible. It therefore serves also as some kind of unit test suite:
- Run `lcd-linkchecker` to check for PHP errors (as well as broken links)
- View the pages to check for visual errors


## Installation
1. Clone the conjin project, e.g. to `repos/conjin`
2. Clone this repository, e.g. to `/repos/conjin-demo`
3. Create the following files:
    - [./deployments/APP_DIR](./deployments/APP_DIR) (contains path, here: `/repos/conjin-demo`)
    - [./deployments/CONJIN_DIR](./deployments/CONJIN_DIR) (contains path, here: `repos/conjin`)
    - [./deployments/DEPLOYMENTS_DIR](./deployments/DEPLOYMENTS_DIR) (contains path, here: `repos/conjin-demo/`)
    - [./deployments/EXTERNAL_TOOLS_PATH](./deployments/EXTERNAL_TOOLS_PATH) (contains path, here: `repos/conjin/build-tools/tools-external.dhall`)
    - [./deployments/dcd/src/RCLONE_CONFIG_PATH](./deployments/dcd/src/RCLONE_CONFIG_PATH) (path to config file)
    - [./deployments/password_list.dhall](./deployments/dcd/src/password_list.dhall) (of type `PasswordList`)
4. Follow installation instructions of the [conjin project](https://github.com/lucques/conjin/).


## Abbreviations
- `lcd` deployment: "local conjin-demo"
- `dcd` deployment: "deployed conjin-demo"


## License
This project is licensed under GPLv3.