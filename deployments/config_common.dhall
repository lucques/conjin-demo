----------------------------------------------------
-- Locations of conjin framework, app, deployment --
----------------------------------------------------

let t              = https://raw.githubusercontent.com/lucques/conjin/eed045a0b2d7921a0af6d31f70c6d41c80efd2bf/build-tools/tools-external.dhall -- 2024-08
let T              = t.types
let P              = t.prelude

let conjinDir      = ./CONJIN_DIR      as Text
let appDir         = ./APP_DIR         as Text
let deploymentsDir = ./DEPLOYMENTS_DIR as Text


------------
-- Config --
------------

let bootstrap = t.makeModule "bootstrap"        True True

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
        , t.allowViewActionForUser (P.List.empty Text) "guest"
    ]
}

in

{
  , t

  , conjinDir
  , appDir
  , deploymentsDir

  , mainTemplate = interbookTemplate
  , modules
  , authentication
  , authorization
}