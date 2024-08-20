let common = ../../config_common.dhall

let t = common.t
let T = common.t.types
let P = common.t.prelude


------------
-- Config --
------------

let deplName       = "lcd"
let deplDir        = common.deploymentsDir ++ "/" ++ deplName

let db = t.makeDefaultDockerDb common.appDir deplDir
let dbModule = t.makeDbModuleFromDockerDb db

in

t.makeDefaultDockerNginxDepl
    deplName
    common.conjinDir
    common.appDir
    deplDir
    common.authentication
    common.authorization
    (Some db)
    (t.moduleValueToModule common.mainTemplate)
    (common.modules # [dbModule])
: T.DockerNginxDepl