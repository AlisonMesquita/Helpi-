<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *                                   ATTENTION!
 * If you see this message in your browser (Internet Explorer, Mozilla Firefox, Google Chrome, etc.)
 * this means that PHP is not properly installed on your web server. Please refer to the PHP manual
 * for more details: http://php.net/manual/install.php 
 *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */

    include_once dirname(__FILE__) . '/components/startup.php';
    include_once dirname(__FILE__) . '/components/application.php';
    include_once dirname(__FILE__) . '/' . 'authorization.php';


    include_once dirname(__FILE__) . '/' . 'database_engine/mysql_engine.php';
    include_once dirname(__FILE__) . '/' . 'components/page/page_includes.php';

    function GetConnectionOptions()
    {
        $result = GetGlobalConnectionOptions();
        $result['client_encoding'] = 'utf8';
        GetApplication()->GetUserAuthentication()->applyIdentityToConnectionOptions($result);
        return $result;
    }

    
    
    
    // OnBeforePageExecute event handler
    
    
    
    class oferecermonitoriaPage extends Page
    {
        protected function DoBeforeCreate()
        {
            $this->SetTitle('Oferecer Monitoria');
            $this->SetMenuLabel('Oferecer Monitoria');
            $this->SetHeader(GetPagesHeader());
            $this->SetFooter(GetPagesFooter());
    
            $this->dataset = new TableDataset(
                MySqlIConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`oferecermonitoria`');
            $this->dataset->addFields(
                array(
                    new IntegerField('idOferecerMonitoria', true, true, true),
                    new IntegerField('ConsultarOfertaM_idConsultarOfertaM', true),
                    new IntegerField('Monitor_idMonitor', true),
                    new StringField('NomeDoMonitor'),
                    new StringField('CursoDoMonitor'),
                    new StringField('MateriaOfertada'),
                    new IntegerField('NumeroDeVagas')
                )
            );
        }
    
        protected function DoPrepare() {
    
        }
    
        protected function CreatePageNavigator()
        {
            $result = new CompositePageNavigator($this);
            
            $partitionNavigator = new PageNavigator('pnav', $this, $this->dataset);
            $partitionNavigator->SetRowsPerPage(20);
            $result->AddPageNavigator($partitionNavigator);
            
            return $result;
        }
    
        protected function CreateRssGenerator()
        {
            return null;
        }
    
        protected function setupCharts()
        {
    
        }
    
        protected function getFiltersColumns()
        {
            return array(
                new FilterColumn($this->dataset, 'idOferecerMonitoria', 'idOferecerMonitoria', 'Id Oferecer Monitoria'),
                new FilterColumn($this->dataset, 'ConsultarOfertaM_idConsultarOfertaM', 'ConsultarOfertaM_idConsultarOfertaM', 'Consultar Oferta M Id Consultar Oferta M'),
                new FilterColumn($this->dataset, 'Monitor_idMonitor', 'Monitor_idMonitor', 'Monitor Id Monitor'),
                new FilterColumn($this->dataset, 'NomeDoMonitor', 'NomeDoMonitor', 'Nome Do Monitor'),
                new FilterColumn($this->dataset, 'CursoDoMonitor', 'CursoDoMonitor', 'Curso Do Monitor'),
                new FilterColumn($this->dataset, 'MateriaOfertada', 'MateriaOfertada', 'Materia Ofertada'),
                new FilterColumn($this->dataset, 'NumeroDeVagas', 'NumeroDeVagas', 'Numero De Vagas')
            );
        }
    
        protected function setupQuickFilter(QuickFilter $quickFilter, FixedKeysArray $columns)
        {
            $quickFilter
                ->addColumn($columns['NomeDoMonitor'])
                ->addColumn($columns['CursoDoMonitor'])
                ->addColumn($columns['MateriaOfertada'])
                ->addColumn($columns['NumeroDeVagas']);
        }
    
        protected function setupColumnFilter(ColumnFilter $columnFilter)
        {
    
        }
    
        protected function setupFilterBuilder(FilterBuilder $filterBuilder, FixedKeysArray $columns)
        {
            $main_editor = new TextEdit('nomedomonitor_edit');
            $main_editor->SetMaxLength(45);
            
            $filterBuilder->addColumn(
                $columns['NomeDoMonitor'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('cursodomonitor_edit');
            $main_editor->SetMaxLength(45);
            
            $filterBuilder->addColumn(
                $columns['CursoDoMonitor'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('materiaofertada_edit');
            $main_editor->SetMaxLength(45);
            
            $filterBuilder->addColumn(
                $columns['MateriaOfertada'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('numerodevagas_edit');
            
            $filterBuilder->addColumn(
                $columns['NumeroDeVagas'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
        }
    
        protected function AddOperationsColumns(Grid $grid)
        {
            $actions = $grid->getActions();
            $actions->setCaption($this->GetLocalizerCaptions()->GetMessageString('Actions'));
            $actions->setPosition(ActionList::POSITION_LEFT);
            
            if ($this->GetSecurityInfo()->HasViewGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('View'), OPERATION_VIEW, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
            }
            
            if ($this->GetSecurityInfo()->HasEditGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('Edit'), OPERATION_EDIT, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
                $operation->OnShow->AddListener('ShowEditButtonHandler', $this);
            }
            
            if ($this->GetSecurityInfo()->HasDeleteGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('Delete'), OPERATION_DELETE, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
                $operation->OnShow->AddListener('ShowDeleteButtonHandler', $this);
                $operation->SetAdditionalAttribute('data-modal-operation', 'delete');
                $operation->SetAdditionalAttribute('data-delete-handler-name', $this->GetModalGridDeleteHandler());
            }
            
            if ($this->GetSecurityInfo()->HasAddGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('Copy'), OPERATION_COPY, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
            }
        }
    
        protected function AddFieldColumns(Grid $grid, $withDetails = true)
        {
            //
            // View column for NomeDoMonitor field
            //
            $column = new TextViewColumn('NomeDoMonitor', 'NomeDoMonitor', 'Nome Do Monitor', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for CursoDoMonitor field
            //
            $column = new TextViewColumn('CursoDoMonitor', 'CursoDoMonitor', 'Curso Do Monitor', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for MateriaOfertada field
            //
            $column = new TextViewColumn('MateriaOfertada', 'MateriaOfertada', 'Materia Ofertada', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for NumeroDeVagas field
            //
            $column = new NumberViewColumn('NumeroDeVagas', 'NumeroDeVagas', 'Numero De Vagas', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
        }
    
        protected function AddSingleRecordViewColumns(Grid $grid)
        {
            //
            // View column for NomeDoMonitor field
            //
            $column = new TextViewColumn('NomeDoMonitor', 'NomeDoMonitor', 'Nome Do Monitor', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for CursoDoMonitor field
            //
            $column = new TextViewColumn('CursoDoMonitor', 'CursoDoMonitor', 'Curso Do Monitor', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for MateriaOfertada field
            //
            $column = new TextViewColumn('MateriaOfertada', 'MateriaOfertada', 'Materia Ofertada', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for NumeroDeVagas field
            //
            $column = new NumberViewColumn('NumeroDeVagas', 'NumeroDeVagas', 'Numero De Vagas', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
        }
    
        protected function AddEditColumns(Grid $grid)
        {
            //
            // Edit column for NomeDoMonitor field
            //
            $editor = new TextEdit('nomedomonitor_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Nome Do Monitor', 'NomeDoMonitor', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for CursoDoMonitor field
            //
            $editor = new TextEdit('cursodomonitor_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Curso Do Monitor', 'CursoDoMonitor', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for MateriaOfertada field
            //
            $editor = new TextEdit('materiaofertada_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Materia Ofertada', 'MateriaOfertada', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for NumeroDeVagas field
            //
            $editor = new TextEdit('numerodevagas_edit');
            $editColumn = new CustomEditColumn('Numero De Vagas', 'NumeroDeVagas', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
        }
    
        protected function AddMultiEditColumns(Grid $grid)
        {
            //
            // Edit column for NomeDoMonitor field
            //
            $editor = new TextEdit('nomedomonitor_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Nome Do Monitor', 'NomeDoMonitor', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for CursoDoMonitor field
            //
            $editor = new TextEdit('cursodomonitor_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Curso Do Monitor', 'CursoDoMonitor', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for MateriaOfertada field
            //
            $editor = new TextEdit('materiaofertada_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Materia Ofertada', 'MateriaOfertada', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for NumeroDeVagas field
            //
            $editor = new TextEdit('numerodevagas_edit');
            $editColumn = new CustomEditColumn('Numero De Vagas', 'NumeroDeVagas', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
        }
    
        protected function AddInsertColumns(Grid $grid)
        {
            //
            // Edit column for NomeDoMonitor field
            //
            $editor = new TextEdit('nomedomonitor_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Nome Do Monitor', 'NomeDoMonitor', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for CursoDoMonitor field
            //
            $editor = new TextEdit('cursodomonitor_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Curso Do Monitor', 'CursoDoMonitor', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for MateriaOfertada field
            //
            $editor = new TextEdit('materiaofertada_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Materia Ofertada', 'MateriaOfertada', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for NumeroDeVagas field
            //
            $editor = new TextEdit('numerodevagas_edit');
            $editColumn = new CustomEditColumn('Numero De Vagas', 'NumeroDeVagas', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            $grid->SetShowAddButton(true && $this->GetSecurityInfo()->HasAddGrant());
        }
    
        private function AddMultiUploadColumn(Grid $grid)
        {
    
        }
    
        protected function AddPrintColumns(Grid $grid)
        {
            //
            // View column for NomeDoMonitor field
            //
            $column = new TextViewColumn('NomeDoMonitor', 'NomeDoMonitor', 'Nome Do Monitor', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for CursoDoMonitor field
            //
            $column = new TextViewColumn('CursoDoMonitor', 'CursoDoMonitor', 'Curso Do Monitor', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for MateriaOfertada field
            //
            $column = new TextViewColumn('MateriaOfertada', 'MateriaOfertada', 'Materia Ofertada', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for NumeroDeVagas field
            //
            $column = new NumberViewColumn('NumeroDeVagas', 'NumeroDeVagas', 'Numero De Vagas', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
        }
    
        protected function AddExportColumns(Grid $grid)
        {
            //
            // View column for NomeDoMonitor field
            //
            $column = new TextViewColumn('NomeDoMonitor', 'NomeDoMonitor', 'Nome Do Monitor', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for CursoDoMonitor field
            //
            $column = new TextViewColumn('CursoDoMonitor', 'CursoDoMonitor', 'Curso Do Monitor', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for MateriaOfertada field
            //
            $column = new TextViewColumn('MateriaOfertada', 'MateriaOfertada', 'Materia Ofertada', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for NumeroDeVagas field
            //
            $column = new NumberViewColumn('NumeroDeVagas', 'NumeroDeVagas', 'Numero De Vagas', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
        }
    
        private function AddCompareColumns(Grid $grid)
        {
            //
            // View column for NomeDoMonitor field
            //
            $column = new TextViewColumn('NomeDoMonitor', 'NomeDoMonitor', 'Nome Do Monitor', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for CursoDoMonitor field
            //
            $column = new TextViewColumn('CursoDoMonitor', 'CursoDoMonitor', 'Curso Do Monitor', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for MateriaOfertada field
            //
            $column = new TextViewColumn('MateriaOfertada', 'MateriaOfertada', 'Materia Ofertada', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for NumeroDeVagas field
            //
            $column = new NumberViewColumn('NumeroDeVagas', 'NumeroDeVagas', 'Numero De Vagas', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
        }
    
        private function AddCompareHeaderColumns(Grid $grid)
        {
    
        }
    
        public function GetPageDirection()
        {
            return null;
        }
    
        public function isFilterConditionRequired()
        {
            return false;
        }
    
        protected function ApplyCommonColumnEditProperties(CustomEditColumn $column)
        {
            $column->SetDisplaySetToNullCheckBox(false);
            $column->SetDisplaySetToDefaultCheckBox(false);
    		$column->SetVariableContainer($this->GetColumnVariableContainer());
        }
    
        function GetCustomClientScript()
        {
            return ;
        }
        
        function GetOnPageLoadedClientScript()
        {
            return ;
        }
        protected function GetEnableModalGridDelete() { return true; }
    
        protected function CreateGrid()
        {
            $result = new Grid($this, $this->dataset);
            if ($this->GetSecurityInfo()->HasDeleteGrant())
               $result->SetAllowDeleteSelected(true);
            else
               $result->SetAllowDeleteSelected(false);   
            
            ApplyCommonPageSettings($this, $result);
            
            $result->SetUseImagesForActions(true);
            $result->SetUseFixedHeader(false);
            $result->SetShowLineNumbers(false);
            $result->SetShowKeyColumnsImagesInHeader(false);
            $result->SetViewMode(ViewMode::TABLE);
            $result->setEnableRuntimeCustomization(true);
            $result->setAllowCompare(true);
            $this->AddCompareHeaderColumns($result);
            $this->AddCompareColumns($result);
            $result->setMultiEditAllowed($this->GetSecurityInfo()->HasEditGrant() && true);
            $result->setTableBordered(false);
            $result->setTableCondensed(false);
            
            $result->SetHighlightRowAtHover(false);
            $result->SetWidth('');
            $this->AddOperationsColumns($result);
            $this->AddFieldColumns($result);
            $this->AddSingleRecordViewColumns($result);
            $this->AddEditColumns($result);
            $this->AddMultiEditColumns($result);
            $this->AddInsertColumns($result);
            $this->AddPrintColumns($result);
            $this->AddExportColumns($result);
            $this->AddMultiUploadColumn($result);
    
    
            $this->SetShowPageList(true);
            $this->SetShowTopPageNavigator(true);
            $this->SetShowBottomPageNavigator(true);
            $this->setPrintListAvailable(true);
            $this->setPrintListRecordAvailable(false);
            $this->setPrintOneRecordAvailable(true);
            $this->setAllowPrintSelectedRecords(true);
            $this->setExportListAvailable(array('pdf', 'excel', 'word', 'xml', 'csv'));
            $this->setExportSelectedRecordsAvailable(array('pdf', 'excel', 'word', 'xml', 'csv'));
            $this->setExportListRecordAvailable(array());
            $this->setExportOneRecordAvailable(array('pdf', 'excel', 'word', 'xml', 'csv'));
    
            return $result;
        }
     
        protected function setClientSideEvents(Grid $grid) {
    
        }
    
        protected function doRegisterHandlers() {
            
            
        }
       
        protected function doCustomRenderColumn($fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomRenderPrintColumn($fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomRenderExportColumn($exportType, $fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomDrawRow($rowData, &$cellFontColor, &$cellFontSize, &$cellBgColor, &$cellItalicAttr, &$cellBoldAttr)
        {
    
        }
    
        protected function doExtendedCustomDrawRow($rowData, &$rowCellStyles, &$rowStyles, &$rowClasses, &$cellClasses)
        {
    
        }
    
        protected function doCustomRenderTotal($totalValue, $aggregate, $columnName, &$customText, &$handled)
        {
    
        }
    
        protected function doCustomDefaultValues(&$values, &$handled) 
        {
    
        }
    
        protected function doCustomCompareColumn($columnName, $valueA, $valueB, &$result)
        {
    
        }
    
        protected function doBeforeInsertRecord($page, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doBeforeUpdateRecord($page, $oldRowData, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doBeforeDeleteRecord($page, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doAfterInsertRecord($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doAfterUpdateRecord($page, $oldRowData, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doAfterDeleteRecord($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doCustomHTMLHeader($page, &$customHtmlHeaderText)
        { 
    
        }
    
        protected function doGetCustomTemplate($type, $part, $mode, &$result, &$params)
        {
    
        }
    
        protected function doGetCustomExportOptions(Page $page, $exportType, $rowData, &$options)
        {
    
        }
    
        protected function doFileUpload($fieldName, $rowData, &$result, &$accept, $originalFileName, $originalFileExtension, $fileSize, $tempFileName)
        {
    
        }
    
        protected function doPrepareChart(Chart $chart)
        {
    
        }
    
        protected function doPrepareColumnFilter(ColumnFilter $columnFilter)
        {
    
        }
    
        protected function doPrepareFilterBuilder(FilterBuilder $filterBuilder, FixedKeysArray $columns)
        {
    
        }
    
        protected function doGetSelectionFilters(FixedKeysArray $columns, &$result)
        {
    
        }
    
        protected function doGetCustomFormLayout($mode, FixedKeysArray $columns, FormLayout $layout)
        {
    
        }
    
        protected function doGetCustomColumnGroup(FixedKeysArray $columns, ViewColumnGroup $columnGroup)
        {
    
        }
    
        protected function doPageLoaded()
        {
    
        }
    
        protected function doCalculateFields($rowData, $fieldName, &$value)
        {
    
        }
    
        protected function doGetCustomPagePermissions(Page $page, PermissionSet &$permissions, &$handled)
        {
    
        }
    
        protected function doGetCustomRecordPermissions(Page $page, &$usingCondition, $rowData, &$allowEdit, &$allowDelete, &$mergeWithDefault, &$handled)
        {
    
        }
    
    }

    SetUpUserAuthorization();

    try
    {
        $Page = new oferecermonitoriaPage("oferecermonitoria", "oferecermonitoria.php", GetCurrentUserPermissionSetForDataSource("oferecermonitoria"), 'UTF-8');
        $Page->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource("oferecermonitoria"));
        GetApplication()->SetMainPage($Page);
        GetApplication()->Run();
    }
    catch(Exception $e)
    {
        ShowErrorPage($e);
    }
	
