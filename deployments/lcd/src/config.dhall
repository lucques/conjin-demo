let common = ../../config_common.dhall

let t = common.t
let T = common.t.types
let P = common.t.prelude


------------
-- Config --
------------

let deplName = "lcd"
let deplDir  = common.deploymentsDir ++ "/" ++ deplName

let db = t.makeDefaultDockerDb common.appDir deplDir

let authentication = {
    , loginWithoutUserName = True
    , users2passwords = [
        , t.assignUser2Password "root"        "rutus"
        , t.assignUser2Password "admin"       "admin"
        , t.assignUser2Password "preprocess"  "preprocess"
        , t.assignUser2Password "linkchecker" "linkchecker"
    ]
}

in

t.makeDefaultDockerNginxDepl
    deplName
    common.conjinDir
    common.appDir
    deplDir
    authentication
    common.authorization
    (Some db)
    common.localBareModules
    common.modules
: T.DockerNginxDepl