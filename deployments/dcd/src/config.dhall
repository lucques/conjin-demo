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

in

t.makeDefaultDockerSyncDepl
    deplName
    common.conjinDir
    common.appDir
    deplDir
    common.authentication
    common.authorization
    (None T.ServerDb)
    (t.moduleValueToModule common.mainTemplate)
    common.modules
    host
    pathBase
    urlBase
    rcloneRemote
: T.DockerSyncDepl