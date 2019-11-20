<?php

//  define('SHOW_VARIABLES', 1);
//  define('DEBUG_LEVEL', 1);

//  error_reporting(E_ALL ^ E_NOTICE);
//  ini_set('display_errors', 'On');

set_include_path('.' . PATH_SEPARATOR . get_include_path());


include_once dirname(__FILE__) . '/' . 'components/utils/system_utils.php';
include_once dirname(__FILE__) . '/' . 'components/mail/mailer.php';
include_once dirname(__FILE__) . '/' . 'components/mail/phpmailer_based_mailer.php';
require_once dirname(__FILE__) . '/' . 'database_engine/mysql_engine.php';

//  SystemUtils::DisableMagicQuotesRuntime();

SystemUtils::SetTimeZoneIfNeed('America/Argentina/Buenos_Aires');

function GetGlobalConnectionOptions()
{
    return
        array(
          'server' => 'localhost',
          'port' => '3306',
          'username' => 'root',
          'database' => 'helpi.v2',
          'client_encoding' => 'utf8'
        );
}

function HasAdminPage()
{
    return false;
}

function HasHomePage()
{
    return true;
}

function GetHomeURL()
{
    return 'index.php';
}

function GetHomePageBanner()
{
    return '';
}

function GetPageGroups()
{
    $result = array();
    $result[] = array('caption' => 'Default', 'description' => '');
    return $result;
}

function GetPageInfos()
{
    $result = array();
    $result[] = array('caption' => 'Materia', 'short_caption' => 'Materia', 'filename' => 'materia.php', 'name' => 'materia', 'group_name' => 'Default', 'add_separator' => false, 'description' => 'Inserção, alteração, consulta e remoção de materias da plataforma.');
    $result[] = array('caption' => 'Monitor', 'short_caption' => 'Monitor', 'filename' => 'monitor.php', 'name' => 'monitor', 'group_name' => 'Default', 'add_separator' => false, 'description' => 'Inserção, alteração, consulta e remoção de monitores da plataforma.');
    $result[] = array('caption' => 'Solicitar Ajuda', 'short_caption' => 'Solicitar Ajuda', 'filename' => 'solicitarajuda.php', 'name' => 'solicitarajuda', 'group_name' => 'Default', 'add_separator' => false, 'description' => 'Inserção, alteração, consulta e remoção de solicitações de ajuda da plataforma.');
    $result[] = array('caption' => 'Oferecer Monitoria', 'short_caption' => 'Oferecer Monitoria', 'filename' => 'oferecermonitoria.php', 'name' => 'oferecermonitoria', 'group_name' => 'Default', 'add_separator' => false, 'description' => 'Inserção, alteração, consulta e remoção de ofertas de monitoria da plataforma.');
    $result[] = array('caption' => 'Usuario', 'short_caption' => 'Usuario', 'filename' => 'usuario.php', 'name' => 'usuario', 'group_name' => 'Default', 'add_separator' => false, 'description' => 'Inserção, alteração, consulta e remoção de usuarios da plataforma.');
    return $result;
}

function GetPagesHeader()
{
    return
        '<div class="alert alert-danger SQLGeneratorEvaluationVersion"><h3 class="SQLGeneratorEvaluationVersion-head">This website was created by evaluation version of <a href="http://www.sqlmaestro.com/products/mysql/phpgenerator/" class="alert-link">PHP Generator for MySQL Professional</a>.</h3><img class="SQLGeneratorEvaluationVersion-justify" src="components/assets/img/btn-loading.png"></div>';
}

function GetPagesFooter()
{
    return
        '<p align="right">(C) <span>2002-<script type="text/javascript">document.write(new Date().getFullYear().toString())</script></span><a href="http://www.sqlmaestro.com/products/mysql/phpgenerator/"> SQL Maestro Group</a>.</p>';
}

function ApplyCommonPageSettings(Page $page, Grid $grid)
{
    $page->SetShowUserAuthBar(false);
    $page->setShowNavigation(true);
    $page->OnCustomHTMLHeader->AddListener('Global_CustomHTMLHeaderHandler');
    $page->OnGetCustomTemplate->AddListener('Global_GetCustomTemplateHandler');
    $page->OnGetCustomExportOptions->AddListener('Global_OnGetCustomExportOptions');
    $page->getDataset()->OnGetFieldValue->AddListener('Global_OnGetFieldValue');
    $page->getDataset()->OnGetFieldValue->AddListener('OnGetFieldValue', $page);
    $grid->BeforeUpdateRecord->AddListener('Global_BeforeUpdateHandler');
    $grid->BeforeDeleteRecord->AddListener('Global_BeforeDeleteHandler');
    $grid->BeforeInsertRecord->AddListener('Global_BeforeInsertHandler');
    $grid->AfterUpdateRecord->AddListener('Global_AfterUpdateHandler');
    $grid->AfterDeleteRecord->AddListener('Global_AfterDeleteHandler');
    $grid->AfterInsertRecord->AddListener('Global_AfterInsertHandler');
}

function GetAnsiEncoding() { return 'windows-1252'; }

function Global_OnGetCustomPagePermissionsHandler(Page $page, PermissionSet &$permissions, &$handled)
{

}

function Global_CustomHTMLHeaderHandler($page, &$customHtmlHeaderText)
{

}

function Global_GetCustomTemplateHandler($type, $part, $mode, &$result, &$params, CommonPage $page = null)
{

}

function Global_OnGetCustomExportOptions($page, $exportType, $rowData, &$options)
{

}

function Global_OnGetFieldValue($fieldName, &$value, $tableName)
{

}

function Global_GetCustomPageList(CommonPage $page, PageList $pageList)
{

}

function Global_BeforeInsertHandler($page, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
{

}

function Global_BeforeUpdateHandler($page, $oldRowData, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
{

}

function Global_BeforeDeleteHandler($page, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
{

}

function Global_AfterInsertHandler($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
{

}

function Global_AfterUpdateHandler($page, $oldRowData, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
{

}

function Global_AfterDeleteHandler($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
{

}

function GetDefaultDateFormat()
{
    return 'Y-m-d';
}

function GetFirstDayOfWeek()
{
    return 0;
}

function GetPageListType()
{
    return PageList::TYPE_MENU;
}

function GetNullLabel()
{
    return null;
}

function UseMinifiedJS()
{
    return true;
}

function GetOfflineMode()
{
    return false;
}

function GetInactivityTimeout()
{
    return 0;
}

function GetMailer()
{
    $mailerOptions = new MailerOptions(MailerType::Sendmail, '', '');
    
    return PHPMailerBasedMailer::getInstance($mailerOptions);
}

function sendMailMessage($recipients, $messageSubject, $messageBody, $attachments = '', $cc = '', $bcc = '')
{
    GetMailer()->send($recipients, $messageSubject, $messageBody, $attachments, $cc, $bcc);
}

function createConnection()
{
    $connectionOptions = GetGlobalConnectionOptions();
    $connectionOptions['client_encoding'] = 'utf8';

    $connectionFactory = MySqlIConnectionFactory::getInstance();
    return $connectionFactory->CreateConnection($connectionOptions);
}
