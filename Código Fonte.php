<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, maximum-scale=1">
            <meta charset="UTF-8">
        
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <title>Home page</title>
    
    <link rel="stylesheet" type="text/css" href="components/assets/css/main.css" />
            
    
        <script>
        window.beforePageLoad = function () {
            
        }
        window.afterPageLoad = function () {
            
        }
    </script>
    
    <script type="text/javascript" src="components/js/require-config.js"></script>
            <script type="text/javascript" src="components/js/libs/require.js"></script>
        <script type="text/javascript" src="components/js/main-bundle.js"></script>
    </head>

        
<body id="pgpage-" data-page-entry="" data-inactivity-timeout="0">
<nav id="navbar" class="navbar navbar-default navbar-fixed-top">

    
    <div class="container-fluid">
        <div class="navbar-header">
                            <div class="alert alert-danger SQLGeneratorEvaluationVersion"><h3 class="SQLGeneratorEvaluationVersion-head">This website was created by evaluation version of <a href="http://www.sqlmaestro.com/products/mysql/phpgenerator/" class="alert-link">PHP Generator for MySQL Professional</a>.</h3><img class="SQLGeneratorEvaluationVersion-justify" src="components/assets/img/btn-loading.png"></div>
                                </div>

        <div class="navbar-collapse collapse" id="navnav">
            
            
                    </div>
    </div>
</nav>


    

<div class="container-fluid">

    <div class="row">

        
        <div class="col-md-12">
                            <div class="container-padding">
                    
    

            
            
    
                    
                    <div class="row pgui-home-row pgui-home-group-default">
            
            
                                    
                    <div class="col-md-4 col-sm-6 col-xs-12 pgui-home-col">
                        <div class="pgui-home-item-wrapper">
                            <div class="pgui-home-item">
                                <a href="materia.php" title="Materia">
                                    Materia
                                </a>

                                                                    <p>Inserção, alteração, consulta e remoção de materias da plataforma.</p>
                                                            </div>
                        </div>
                    </div>
                            
                                    
                    <div class="col-md-4 col-sm-6 col-xs-12 pgui-home-col">
                        <div class="pgui-home-item-wrapper">
                            <div class="pgui-home-item">
                                <a href="monitor.php" title="Monitor">
                                    Monitor
                                </a>

                                                                    <p>Inserção, alteração, consulta e remoção de monitores da plataforma.</p>
                                                            </div>
                        </div>
                    </div>
                            
                                    
                    <div class="col-md-4 col-sm-6 col-xs-12 pgui-home-col">
                        <div class="pgui-home-item-wrapper">
                            <div class="pgui-home-item">
                                <a href="solicitarajuda.php" title="Solicitar Ajuda">
                                    Solicitar Ajuda
                                </a>

                                                                    <p>Inserção, alteração, consulta e remoção de solicitações de ajuda da plataforma.</p>
                                                            </div>
                        </div>
                    </div>
                            
                                    
                    <div class="col-md-4 col-sm-6 col-xs-12 pgui-home-col">
                        <div class="pgui-home-item-wrapper">
                            <div class="pgui-home-item">
                                <a href="oferecermonitoria.php" title="Oferecer Monitoria">
                                    Oferecer Monitoria
                                </a>

                                                                    <p>Inserção, alteração, consulta e remoção de ofertas de monitoria da plataforma.</p>
                                                            </div>
                        </div>
                    </div>
                            
                                    
                    <div class="col-md-4 col-sm-6 col-xs-12 pgui-home-col">
                        <div class="pgui-home-item-wrapper">
                            <div class="pgui-home-item">
                                <a href="usuario.php" title="Usuario">
                                    Usuario
                                </a>

                                                                    <p>Inserção, alteração, consulta e remoção de usuarios da plataforma.</p>
                                                            </div>
                        </div>
                    </div>
                                        </div>
            
    


                    

                                            <hr>
                        <footer>
                            <p align="right">(C) <span>2002-<script type="text/javascript">document.write(new Date().getFullYear().toString())</script></span><a href="http://www.sqlmaestro.com/products/mysql/phpgenerator/"> SQL Maestro Group</a>.</p>
                        </footer>
                    
                                    </div>
                    </div>

    </div>
</div>
<div id="pg-change-password-dialog" class="modal fade" tabindex="-1">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span aria-hidden="true">&times;</span></span></button>
        <h4 class="modal-title" id="pg-change-password-dialog-header-user">Change your password</h4>
        <h4 class="modal-title" id="pg-change-password-dialog-header-admin">Change password for user '<span data-bind="text: changePasswordUser.name"></span>'</h4>
    </div>

    <div class="modal-body">

        <form class="form-horizontal">
            <fieldset>

                <div class="form-group" id="pg-change-password-dialog-current-password-form-group">
                    <label class="col-sm-3 control-label" for="pg-change-password-dialog-current-password">
                        Current password
                    </label>
                    <div class="col-sm-9">
                        <input id="pg-change-password-dialog-current-password"
                               type="password"
                               name="currentPassword"
                               class="form-control" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="pg-change-password-dialog-new-password">New password</label>
                    <div class="col-sm-9">
                        <input id="pg-change-password-dialog-new-password"
                               type="password"
                               name="newPassword"
                               class="form-control" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="pg-change-password-dialog-confirmed-password">Confirm password</label>
                    <div class="col-sm-9">
                        <input id="pg-change-password-dialog-confirmed-password"
                               type="password"
                               name="confirmedPassword"
                               class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9 col-offset-sm-3">
                        <div class="alert alert-warning" id="pg-change-password-dialog-confirmed-password-error">
                            <p>Passwords do not match. Please try again.</p>
                        </div>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>

    <div class="modal-footer">
        <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
        <a href="#" class="btn btn-primary" id="pg-change-password-dialog-ok-button">Change password</a>
    </div>
  </div>
</div>
</div>
</body>
</html>