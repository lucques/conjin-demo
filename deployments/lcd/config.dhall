----------------------------------------------------
-- Locations of conjin framework, app, deployment --
----------------------------------------------------

let t              = https://raw.githubusercontent.com/lucques/conjin/44f2660f9626a3321e7efc6d9cd633b5f70e03dc/build-tools/tools-external.dhall
let T              = t.types
let P              = t.prelude

let conjinDir      = ../CONJIN_DIR      as Text
let appDir         = ../APP_DIR         as Text
let deploymentsDir = ../DEPLOYMENTS_DIR as Text

let deplName       = "lcd"
let deplDir        = deploymentsDir ++ "/" ++ deplName


------------
-- Config --
------------

let db = t.makeDefaultDockerDb appDir deplDir
let dbModule = t.makeDbModuleFromDockerDb db

let bootstrap       = t.makeModule "bootstrap"        True True

let genericTemplate = t.makeModule "template-generic" True False

let navigableTemplate = {
  , location = { dirName = "template-navigable", isShared = True, isExternal = False }
  , config = t.prelude.JSON.null
  , compileScss = True
  , scssModuleDeps = [ bootstrap.location ]
}

let bootstrappedTemplate = {
  , location = { dirName = "template-bootstrapped", isShared = True, isExternal = False }
  , config = t.prelude.JSON.null
  , compileScss = True
  , scssModuleDeps = [ bootstrap.location ]
}

let interbookTemplate = {
  , location = { dirName = "template-interbook", isShared = True, isExternal = False }
  , config = t.prelude.JSON.null
  , compileScss = True
  , scssModuleDeps = [ bootstrap.location, bootstrappedTemplate.location, navigableTemplate.location ]
}

let examTemplate = {
  , location = { dirName = "template-exam", isShared = True, isExternal = False }
  , config = t.prelude.JSON.null
  , compileScss = True
  , scssModuleDeps = [ bootstrap.location, bootstrappedTemplate.location, navigableTemplate.location ]
}

let modules =
    (t.makeModules True False  -- Shared & internal
      [
      , "anchors"
      , "doc-extensions"
      , "exercise"
      , "favicons"
      , "footnotes"
      , "grading"
      , "html"
      , "locale-de"
      , "mathjax-extensions"
      , "math-arith"
      , "math-logic"
      , "nav-common"
      , "nav-view"
      , "nav-build"
      , "print-mode"
      , "references"
      , "sol-mode"
      , "source"
      , "sql-js-inline"
      , "sync-dims"
      , "template-generic"
      , "title"
      , "timetable"
      ])
    #
    (t.makeModules True True  -- Shared & external
      [
      , "bootstrap-icons"
      , "fullcalendar"
      , "mathjax"
      , "prism"
      , "sql-js"
      , "paged-js"
      ])
    #
    [ genericTemplate, bootstrap, bootstrappedTemplate, interbookTemplate, examTemplate, navigableTemplate ]

let authentication = {
    , loginWithoutUserName = True
    , users2passwords = [
        , t.assignUser2Password "root"        "rutus"
        , t.assignUser2Password "admin"       "asdf"
        , t.assignUser2Password "preprocess"  "preprocess"
        , t.assignUser2Password "linkchecker" "linkchecker"
    ]
}

let authorization = {
    , rootUser  = "root"
    , guestUser = "guest"

    , users2groups = P.List.empty T.User2Group
    , actors2privileges = [
        , t.grantPreprocPrivToUser "preprocess"
    ]
    , actors2targetRules = [
        , t.allowViewActionForUser (P.List.empty Text) "admin"
        , t.allowViewActionForUser (P.List.empty Text) "linkchecker"
    ]
}

in

t.makeDefaultDockerNginxDepl
    deplName
    conjinDir
    appDir
    deplDir
    authentication
    authorization
    (Some db)
    (t.moduleValueToModule interbookTemplate)
    (modules # [dbModule])
: T.DockerNginxDepl