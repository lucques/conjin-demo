----------------------------------------------------
-- Locations of conjin framework, app, deployment --
----------------------------------------------------

let t              = ./EXTERNAL_TOOLS_PATH
let T              = t.types
let P              = t.prelude

let conjinDir      = ./CONJIN_DIR      as Text
let appDir         = ./APP_DIR         as Text
let deploymentsDir = ./DEPLOYMENTS_DIR as Text


-------------------
-- Common config --
-------------------

let navigableTemplate = {
  , bare = T.BareModule.TemplateNavigable {=}
  , compileScss = True
  , config = t.prelude.JSON.null
}: T.Module

let bootstrappedTemplate = {
  , bare = T.BareModule.TemplateBootstrapped {=}
  , compileScss = True
  , config = t.prelude.JSON.null
}: T.Module

let interbookTemplate = {
  , bare = T.BareModule.TemplateInterbook {=}
  , compileScss = True
  , config = t.prelude.JSON.null
}: T.Module

let examTemplate = {
  , bare = T.BareModule.TemplateExam {=}
  , compileScss = True
  , config = t.prelude.JSON.null
}: T.Module

let modules = [ navigableTemplate, bootstrappedTemplate, interbookTemplate, examTemplate ]

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

  , localBareModules = P.List.empty T.LocalBareModule
  , modules
  , authorization
}