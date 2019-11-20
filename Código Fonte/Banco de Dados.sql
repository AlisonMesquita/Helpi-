CREATE TABLE RemoverOfertaM (
  idRemoverOfertadeMonitoria INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY(idRemoverOfertadeMonitoria)
);

CREATE TABLE RemoverMonitor (
  idRemoverMonitor INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY(idRemoverMonitor)
);

CREATE TABLE RemoverMateria (
  idRemoverMateria INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY(idRemoverMateria)
);

CREATE TABLE RemoverSAjuda (
  idRemoverSAjuda INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY(idRemoverSAjuda)
);

CREATE TABLE RemoverUsuario (
  idRemoverUsuario INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY(idRemoverUsuario)
);

CREATE TABLE AlterarSAjuda (
  idAlterarSolicitacaodeAjuda INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  RemoverSAjuda_idRemoverSAjuda INTEGER UNSIGNED NOT NULL,
  NomeDoUsuario VARCHAR(45) NULL,
  CursoDoUsuario VARCHAR(45) NULL,
  MateriaDeInteresse VARCHAR(45) NULL,
  PRIMARY KEY(idAlterarSolicitacaodeAjuda),
  INDEX AlterarSAjuda_FKIndex1(RemoverSAjuda_idRemoverSAjuda)
);

CREATE TABLE AlterarUsuario (
  idAlterarUsuario INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  RemoverUsuario_idRemoverUsuario INTEGER UNSIGNED NOT NULL,
  NomeDoUsuario VARCHAR(45) NULL,
  CursoDoUsuario VARCHAR(45) NULL,
  Identificacao INTEGER UNSIGNED NULL,
  PeriodoDoCurso INTEGER UNSIGNED NULL,
  PRIMARY KEY(idAlterarUsuario),
  INDEX AlterarUsuario_FKIndex1(RemoverUsuario_idRemoverUsuario)
);

CREATE TABLE AlterarOfertaM (
  idAlterarOfertaM INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  RemoverOfertaM_idRemoverOfertadeMonitoria INTEGER UNSIGNED NOT NULL,
  NomeDoMonitor VARCHAR(45) NULL,
  CursoDoMonitor VARCHAR(45) NULL,
  MateriaOfertada VARCHAR(45) NULL,
  NumeroDeVagas INTEGER UNSIGNED NULL,
  PRIMARY KEY(idAlterarOfertaM),
  INDEX AlterarOfertaM_FKIndex1(RemoverOfertaM_idRemoverOfertadeMonitoria)
);

CREATE TABLE AlterarMateria (
  idAlterarMateria INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  RemoverMateria_idRemoverMateria INTEGER UNSIGNED NOT NULL,
  NomeDaMateria VARCHAR(45) NULL,
  CursosQuePossuem VARCHAR(100) NULL,
  Complemento VARCHAR(45) NULL,
  PRIMARY KEY(idAlterarMateria),
  INDEX AlterarMateria_FKIndex1(RemoverMateria_idRemoverMateria)
);

CREATE TABLE AlterarMonitor (
  idAlterarMonitor INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  RemoverMonitor_idRemoverMonitor INTEGER UNSIGNED NOT NULL,
  NomeDoMonitor VARCHAR(45) NULL,
  CursoDoMonitor VARCHAR(45) NULL,
  PeriodoDoCurso INTEGER UNSIGNED NULL,
  Identificacao INTEGER UNSIGNED NULL,
  MateriaOfertada VARCHAR(45) NULL,
  PRIMARY KEY(idAlterarMonitor),
  INDEX AlterarMonitor_FKIndex1(RemoverMonitor_idRemoverMonitor)
);

CREATE TABLE ConsultarMateria (
  idConsultarMateria INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  AlterarMateria_idAlterarMateria INTEGER UNSIGNED NOT NULL,
  NomeDaMateria VARCHAR(45) NULL,
  NomeDoMonitor VARCHAR(45) NULL,
  Organizar VARCHAR(45) NULL,
  PRIMARY KEY(idConsultarMateria),
  INDEX ConsultarMateria_FKIndex1(AlterarMateria_idAlterarMateria)
);

CREATE TABLE ConsultarOfertaM (
  idConsultarOfertaM INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  AlterarOfertaM_idAlterarOfertaM INTEGER UNSIGNED NOT NULL,
  NomeDoMonitor VARCHAR(45) NULL,
  Materia VARCHAR(45) NULL,
  CursoEspecifico VARCHAR(45) NULL,
  Organizar VARCHAR(45) NULL,
  PRIMARY KEY(idConsultarOfertaM),
  INDEX ConsultarOfertaM_FKIndex1(AlterarOfertaM_idAlterarOfertaM)
);

CREATE TABLE ConsultarSAjuda (
  idConsultarSAjuda INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  AlterarSAjuda_idAlterarSolicitacaodeAjuda INTEGER UNSIGNED NOT NULL,
  NomeDoUsuario VARCHAR(45) NULL,
  Materia VARCHAR(45) NULL,
  MonitorEspecifico VARCHAR(45) NULL,
  Organizar VARCHAR(45) NULL,
  PRIMARY KEY(idConsultarSAjuda),
  INDEX Consultar_SAjuda_FKIndex1(AlterarSAjuda_idAlterarSolicitacaodeAjuda)
);

CREATE TABLE ConsultarMonitor (
  idConsultarMonitor INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  AlterarMonitor_idAlterarMonitor INTEGER UNSIGNED NOT NULL,
  NomeDoMonitor VARCHAR(45) NULL,
  CursoDoMonitor VARCHAR(45) NULL,
  MateriasOfertadas VARCHAR(255) NULL,
  Organizar VARCHAR(45) NULL,
  PRIMARY KEY(idConsultarMonitor),
  INDEX ConsultarMonitor_FKIndex1(AlterarMonitor_idAlterarMonitor)
);

CREATE TABLE Monitor (
  idMonitor INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  ConsultarMonitor_idConsultarMonitor INTEGER UNSIGNED NOT NULL,
  NomeDoMonitor VARCHAR(45) NULL,
  CursoDoMonitor VARCHAR(45) NULL,
  PeriodoDoCurso INTEGER UNSIGNED NULL,
  Identificacao INTEGER UNSIGNED NULL,
  MateriaOfertada VARCHAR(45) NULL,
  PRIMARY KEY(idMonitor),
  INDEX Monitor_FKIndex1(ConsultarMonitor_idConsultarMonitor)
);

CREATE TABLE ConsultarUsuario (
  idConsultarUsuario INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  AlterarUsuario_idAlterarUsuario INTEGER UNSIGNED NOT NULL,
  NomeDoUsuario VARCHAR(45) NULL,
  CursoDoUsuario VARCHAR(45) NULL,
  MateriasDeInteresse VARCHAR(45) NULL,
  Organizar VARCHAR(45) NULL,
  PRIMARY KEY(idConsultarUsuario),
  INDEX ConsultarUsuario_FKIndex1(AlterarUsuario_idAlterarUsuario)
);

CREATE TABLE SolicitarAjuda (
  idSolicitarAjuda INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  ConsultarSAjuda_idConsultarSAjuda INTEGER UNSIGNED NOT NULL,
  NomeDoUsuario VARCHAR(45) NULL,
  CursoDoUsuario VARCHAR(45) NULL,
  MateriaDeInteresse VARCHAR(45) NULL,
  PRIMARY KEY(idSolicitarAjuda),
  INDEX SolicitarAjuda_FKIndex1(ConsultarSAjuda_idConsultarSAjuda)
);

CREATE TABLE Usuario (
  idUsuario INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  ConsultarUsuario_idConsultarUsuario INTEGER UNSIGNED NOT NULL,
  NomeDoUsuario VARCHAR(45) NULL,
  CursoDoUsuario VARCHAR(45) NULL,
  Identificacao INTEGER UNSIGNED NULL,
  PeriodoDoCurso INTEGER UNSIGNED NULL,
  PRIMARY KEY(idUsuario),
  INDEX Usuario_FKIndex1(ConsultarUsuario_idConsultarUsuario)
);

CREATE TABLE OferecerMonitoria (
  idOferecerMonitoria INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  ConsultarOfertaM_idConsultarOfertaM INTEGER UNSIGNED NOT NULL,
  Monitor_idMonitor INTEGER UNSIGNED NOT NULL,
  NomeDoMonitor VARCHAR(45) NULL,
  CursoDoMonitor VARCHAR(45) NULL,
  MateriaOfertada VARCHAR(45) NULL,
  NumeroDeVagas INTEGER UNSIGNED NULL,
  PRIMARY KEY(idOferecerMonitoria),
  INDEX OferecerMonitoria_FKIndex1(ConsultarOfertaM_idConsultarOfertaM),
  INDEX OferecerMonitoria_FKIndex2(Monitor_idMonitor)
);

CREATE TABLE Materia (
  idMateria INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  OferecerMonitoria_idOferecerMonitoria INTEGER UNSIGNED NOT NULL,
  ConsultarMateria_idConsultarMateria INTEGER UNSIGNED NOT NULL,
  SolicitarAjuda_idSolicitarAjuda INTEGER UNSIGNED NOT NULL,
  NomeDaMateria VARCHAR(45) NULL,
  CursosQuePossuem VARCHAR(100) NULL,
  Complemento VARCHAR(45) NULL,
  PRIMARY KEY(idMateria),
  INDEX Materia_FKIndex1(SolicitarAjuda_idSolicitarAjuda),
  INDEX Materia_FKIndex2(ConsultarMateria_idConsultarMateria),
  INDEX Materia_FKIndex3(OferecerMonitoria_idOferecerMonitoria)
);