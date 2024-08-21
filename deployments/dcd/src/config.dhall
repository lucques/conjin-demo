let common = ../../config_common.dhall

let t = common.t
let T = common.t.types
let P = common.t.prelude


------------
-- Config --
------------

let deplName = "dcd"
let deplDir  = common.deploymentsDir ++ "/" ++ deplName
let host     = "lukas.convnet.de"
let pathBase = ".."
let urlBase  = "/conjin-demo/"

let rcloneRemote = {
    , name       = "dcd"
    , dir        = "/lukas/conjin-demo"
    , configPath = ./RCLONE_CONFIG_PATH as Text
}

let authentication = {
    , loginWithoutUserName = True
    , users2passwords = ./password_list.dhall
}

in

t.makeDefaultDockerSyncDepl
    deplName
    common.conjinDir
    common.appDir
    deplDir
    authentication
    common.authorization
    (None T.ServerDb)
    common.localBareModules
    common.modules
    host
    pathBase
    urlBase
    rcloneRemote
: T.DockerSyncDepl