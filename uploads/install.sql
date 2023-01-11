-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2017 at 10:23 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `creativeitem_hrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

DROP TABLE IF EXISTS `application`;
CREATE TABLE `application` (
  `application_id` int(11) NOT NULL,
  `applicant_name` longtext COLLATE utf8_unicode_ci,
  `vacancy_id` int(11) DEFAULT NULL,
  `apply_date` longtext COLLATE utf8_unicode_ci,
  `status` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

DROP TABLE IF EXISTS `attendance`;
CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `attendance_code` longtext,
  `status` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` longtext,
  `reason` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `award`
--

DROP TABLE IF EXISTS `award`;
CREATE TABLE `award` (
  `award_id` int(11) NOT NULL,
  `award_code` longtext,
  `name` longtext,
  `gift` longtext,
  `amount` float DEFAULT NULL,
  `date` longtext,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

DROP TABLE IF EXISTS `bank`;
CREATE TABLE `bank` (
  `bank_id` int(11) NOT NULL,
  `name` longtext,
  `branch` longtext,
  `account_holder_name` longtext,
  `account_number` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

DROP TABLE IF EXISTS `complaints`;
CREATE TABLE `complaints` (
  `complaints_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `summary` text COLLATE utf8_unicode_ci,
  `timestamp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department_code` longtext,
  `name` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

DROP TABLE IF EXISTS `designation`;
CREATE TABLE `designation` (
  `designation_id` int(11) NOT NULL,
  `name` longtext,
  `department_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

DROP TABLE IF EXISTS `document`;
CREATE TABLE `document` (
  `document_id` int(11) NOT NULL,
  `resume` longtext,
  `offer_letter` longtext,
  `contract_agreement` longtext,
  `joining_letter` longtext,
  `others` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

DROP TABLE IF EXISTS `expense`;
CREATE TABLE `expense` (
  `expense_id` int(11) NOT NULL,
  `expense_code` longtext,
  `title` longtext,
  `description` longtext,
  `date` longtext,
  `amount` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `holiday`
--

DROP TABLE IF EXISTS `holiday`;
CREATE TABLE `holiday` (
  `holiday_id` int(11) NOT NULL,
  `holiday_code` longtext,
  `date` longtext,
  `occassion` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job_history`
--

DROP TABLE IF EXISTS `job_history`;
CREATE TABLE `job_history` (
  `job_history_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `department` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timestamp_from` int(11) DEFAULT NULL,
  `timestamp_to` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

DROP TABLE IF EXISTS `language`;
CREATE TABLE `language` (
  `phrase_id` int(11) NOT NULL,
  `phrase` longtext COLLATE utf8_unicode_ci,
  `english` longtext COLLATE utf8_unicode_ci,
  `spanish` longtext COLLATE utf8_unicode_ci,
  `french` longtext COLLATE utf8_unicode_ci,
  `german` longtext COLLATE utf8_unicode_ci,
  `chinese` longtext COLLATE utf8_unicode_ci,
  `arabic` longtext COLLATE utf8_unicode_ci,
  `dghfjw` longtext COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`phrase_id`, `phrase`, `english`, `spanish`, `french`, `german`, `chinese`, `arabic`, `dghfjw`) VALUES
(1, 'login', 'Login', 'Iniciar sesión', 'S\'identifier', 'Anmeldung', '登录', 'تسجيل الدخول', NULL),
(2, 'forgot_password', 'Forgot Password', 'Se te olvidó tu contraseña', 'Mot de passe oublié', 'Passwort vergessen', '忘记密码', 'هل نسيت كلمة المرور', NULL),
(3, 'admin_dashboard', 'Admin Dashboard', 'Tablero de instrumentos de administración', 'Administrateur Dashboard', 'Admin-Dashboard', '管理仪表板', 'لوحة المشرف', NULL),
(4, 'dashboard', 'Dashboard', 'Tablero', 'Tableau de bord', 'Instrumententafel', '仪表板', 'لوحة القيادة', NULL),
(5, 'view_all', 'View All', 'Ver todo', 'Voir tout', 'Alle anzeigen', '查看全部', 'عرض جميع', NULL),
(6, 'log_out', 'Log Out', 'Cerrar sesión', 'Connectez - Out', 'Ausloggen', '登出', 'الخروج', NULL),
(7, 'add_shipping_method', 'Add Shipping Method', 'Agregar método de envío', 'Ajouter Méthode d\'expédition', 'In Versandart', '添加送货方式', 'إضافة أسلوب الشحن', NULL),
(8, 'are_you_sure_to_delete_this_information', 'Are You Sure To Delete This Information', 'Está seguro que desea eliminar esta información', 'Êtes-vous sûr de vouloir supprimer cette information', 'Sind Sie sicher, dass diese Informationen zu löschen', '您确定要删除这些信息', 'هل أنت متأكد من حذف هذه المعلومات', NULL),
(9, 'delete', 'Delete', 'Borrar', 'Effacer', 'Löschen', '删除', 'حذف', NULL),
(10, 'cancel', 'Cancel', 'Cancelar', 'Annuler', 'Stornieren', '取消', 'إلغاء', NULL),
(11, 'name', 'Name', 'Nombre', 'prénom', 'Name', '名称', 'اسم', NULL),
(12, 'shipping_method_name', 'Shipping Method Name', 'Nombre del método de envío', 'Nom Méthode d\'expédition', 'Versandmethodenname', '送货方式名称', 'اسم أسلوب الشحن', NULL),
(13, 'save', 'Save', 'Salvar', 'sauvegarder', 'sparen', '保存', 'حفظ', NULL),
(14, 'shipping_method_added_successfully', 'Shipping Method Added Successfully', 'Método de envío añadido correctamente', 'Méthode d\'expédition ajouté avec succès', 'Liefer-Methode erfolgreich hinzugefügt', '航运方法添加成功', 'طريقة الشحن واضاف بنجاح', NULL),
(15, 'success', 'Success', 'Éxito', 'Succès', 'Erfolg', '成功', 'نجاح', NULL),
(16, 'error', 'Error', 'Error', 'Erreur', 'Fehler', '错误', 'خطأ', NULL),
(17, 'enter_method_name', 'Enter Method Name', 'Introducir el nombre de Método', 'Entrez le nom Méthode', 'Geben Sie Methodenname', '输入法名称', 'أدخل اسم الطريقة', NULL),
(18, 'employee', 'Employee', 'Empleado', 'Employé', 'Mitarbeiter', '雇员', 'موظف', NULL),
(19, 'add_employee', 'Add Employee', 'Añadir Empleado', 'Ajouter des employés', 'In Mitarbeiter', '添加员工', 'إضافة موظف', NULL),
(20, 'employee_list', 'Employee List', 'Lista de empleados', 'Liste des employés', 'Mitarbeiterliste', '员工列表', 'قائمة موظف', NULL),
(21, 'department', 'Department', 'Departamento', 'département', 'Abteilung', '部', ' قسم، أقسام', NULL),
(22, 'add_new_department', 'Add New Department', 'Agregar nuevo Departamento', 'Ajouter un nouveau département', 'New Abteilung', '添加新部门', 'إضافة قسم جديد', NULL),
(23, 'ID', 'ID', 'CARNÉ DE IDENTIDAD', 'ID', 'ICH WÜRDE', 'ID', 'هوية شخصية', NULL),
(24, 'department_name', 'Department Name', 'Nombre de Departamento', 'Nom du département', 'Abteilungsname', '部门名称', 'اسم القسم', NULL),
(25, 'designation', 'Designation', 'Designacion', 'La désignation', 'Bezeichnung', '指定', 'تعيين', NULL),
(26, 'options', 'Options', 'opciones', 'options de', 'Optionen', '选项', 'خيارات', NULL),
(27, 'edit', 'Edit', 'Editar', 'modifier', 'Bearbeiten', '编辑', 'تصحيح', NULL),
(28, 'add_department', 'Add Department', 'Añadir Departamento', 'Ajouter Département', 'In Abteilung', '添加部门', 'إضافة قسم', NULL),
(29, 'value_required', 'Value Required', 'valor Obligatorio', 'Valeur Obligatoire', 'Wert Erforderlich', '值必需', 'القيمة المطلوبة', NULL),
(30, 'add_designation', 'Add Designation', 'Añadir Designación', 'Ajouter Désignation', 'In Bezeichnung', '添加名称', 'إضافة تسمية', NULL),
(31, 'edit_department', 'Edit Department', 'Departamento de Edición', 'Modifier Département', 'Abteilung bearbeiten', '编辑部', 'وزارة تحرير', NULL),
(32, 'update_department', 'Update Department', 'Departamento de actualización', 'Mise à jour Département', 'Update-Abteilung', '更新部', 'وزارة تحديث', NULL),
(33, 'personal_info', 'Personal Info', 'Información personal', 'Informations personnelles', 'Persönliche Informationen', '个人信息', 'معلومات شخصية', NULL),
(34, 'account_login', 'Account Login', 'Cuenta de Ingreso', 'Connexion au compte', 'Account Login', '帐号登录', 'تسجل الدخول', NULL),
(35, 'company_details', 'Company Details', 'Detalles de la compañía', 'Détails de la société', 'Firmendetails', '公司信息', 'تفاصيل الشركة', NULL),
(36, 'personal_details', 'Personal Details', 'Detalles personales', 'Détails personnels', 'Persönliche Details', '个人资料', 'تفاصيل شخصية', NULL),
(37, 'acount_login', 'Acount Login', 'Acount Login', 'acount Connexion', 'Acount Anmelden', 'Acount登录', 'Acount الدخول', NULL),
(38, 'bank_account_details', 'Bank Account Details', 'Detalles de cuenta bancaria', 'Détails de compte en banque', 'Bankkonto Daten', '银行账户明细', 'تفاصيل الحساب المصرفي', NULL),
(39, 'documents', 'Documents', 'Documentos', 'Documents', 'Unterlagen', '文件', 'مستندات', NULL),
(40, 'fathers_name', 'Fathers Name', 'Nombre del Padre', 'Le nom du père', 'Väter Namen', '父亲姓名', 'اسم الاب', NULL),
(41, 'date_of_birth', 'Date Of Birth', 'Fecha de nacimiento', 'Date de naissance', 'Geburtsdatum', '出生日期', 'تاريخ الولادة', NULL),
(42, 'gender', 'Gender', 'Género', 'Le genre', 'Geschlecht', '性别', 'جنس', NULL),
(43, 'male', 'Male', 'Masculino', 'Mâle', 'Männlich', '男', 'الذكر', NULL),
(44, 'female', 'Female', 'Hembra', 'Femelle', 'Weiblich', '女', 'إناثا', NULL),
(45, 'phone', 'Phone', 'Teléfono', 'Téléphone', 'Telefon', '电话', 'هاتف', NULL),
(46, 'local_address', 'Local Address', 'Dirección local', 'Adresse locale', 'Lokale Adresse', '本地地址', 'العناوين المحلية', NULL),
(47, 'permanent_address', 'Permanent Address', 'dirección permanente', 'Adresse permanente', 'fester Wohnsitz', '永久地址', 'العنوان الثابت', NULL),
(48, 'nationality', 'Nationality', 'Nacionalidad', 'Nationalité', 'Staatsangehörigkeit', '国籍', 'جنسية', NULL),
(49, 'martial_status', 'Martial Status', 'Estado marcial', 'Statut Martial', 'Martial-Status', '婚姻状况', 'الحالة الإجتماعية', NULL),
(50, 'married', 'Married', 'Casado', 'Marié', 'Verheiratet', '已婚', 'زوجت', NULL),
(51, 'unmarried', 'Unmarried', 'Soltero', 'Célibataire', 'Unverheiratet', '未婚', 'اعزب', NULL),
(52, 'other', 'Other', 'Otro', 'Autre', 'Andere', '其他', 'آخر', NULL),
(53, 'email', 'Email', 'Email', 'Email', 'Email', '电子邮件', 'البريد الإلكتروني', NULL),
(54, 'password', 'Password', 'Contraseña', 'Mot de passe', 'Passwort', '密码', 'كلمه السر', NULL),
(55, 'employee_id', 'Employee Id', 'ID de empleado', 'employé Id', 'Angestellten ID', '员工ID', 'هوية الموظف', NULL),
(56, 'select_department', 'Select Department', 'Seleccione Departamento', 'Sélectionnez Département', 'Wählen Sie Abteilung', '选择部门', 'وزارة اختر', NULL),
(57, 'select_department_first', 'Select Department First', 'Seleccione Departamento Primera', 'Sélectionnez Département Première', 'Wählen Sie Abteilung Erste', '选择第一部', 'تحديد دائرة الأولى', NULL),
(58, 'photo', 'Photo', 'Foto', 'Photo', 'Foto', '照片', 'صورة فوتوغرافية', NULL),
(59, 'date_of_joining', 'Date Of Joining', 'Fecha de inscripción', 'Date d\'adhésion', 'Beitrittsdatum', '入职日期', 'تاريخ الانضمام', NULL),
(60, 'joining_salary', 'Joining Salary', 'Salario unirse', 'Salaire Rejoindre', 'Joining Gehalt', '加入工资', 'الراتب الانضمام', NULL),
(61, 'account_holder_name', 'Account Holder Name', 'nombre del titular de la cuenta', 'Nom du titulaire du compte', 'Name des Kontoinhabers', '账户持有人姓名', 'اسم صاحب الحساب', NULL),
(62, 'account_number', 'Account Number', 'Número de cuenta', 'Numéro de compte', 'Accountnummer', '帐号', 'رقم حساب', NULL),
(63, 'bank_name', 'Bank Name', 'Nombre del banco', 'Nom de banque', 'Bank Name', '银行名', 'اسم البنك', NULL),
(64, 'branch', 'Branch', 'Rama', 'Branche', 'Ast', '科', 'فرع شجرة', NULL),
(65, 'resume_file', 'Resume File', 'Reanudar archivo', 'Resume fichier', 'Resume-Datei', '恢复文件', 'استئناف ملف', NULL),
(66, 'choose', 'Choose', 'Escoger', 'Choisir', 'Wählen', '选择', 'أختر', NULL),
(67, 'change', 'Change', 'Cambio', 'Changement', 'Veränderung', '更改', 'يتغيرون', NULL),
(68, 'offer_letter', 'Offer Letter', 'Carta de oferta', 'Offre Lettre', 'Angebotsschreiben', '录取通知书', 'رسالة عرض', NULL),
(69, 'joining_letter', 'Joining Letter', 'Carta de unirse', 'Rejoindre Lettre', 'Joining Brief', '加入信', 'الانضمام رسالة', NULL),
(70, 'contanct_&_agreement', 'Contanct &amp; Agreement', 'Contanct y Acuerdo', 'Contanct &amp; Accord', 'Contanct &amp; Abkommen', 'Contanct＆协议', 'Contanct والاتفاق', NULL),
(71, 'date_of_leaving', 'Date Of Leaving', 'Fecha de partida', 'Date de sortie', 'Datum des Ausscheidens', '日期离开', 'تاريخ مغادرة', NULL),
(72, 'contract_&_agreement', 'Contract &amp; Agreement', 'Acuerdo de contrato', 'Accord de contrat', 'Vertragsvereinbarung', '合同协议', 'عقد اتفاق', NULL),
(73, 'status', 'Status', 'Estado', 'Statut', 'Status', '状态', 'الحالة', NULL),
(74, 'active', 'Active', 'Activo', 'actif', 'Aktiv', '活性', 'نشيط', NULL),
(75, 'inactive', 'Inactive', 'Inactivo', 'Inactif', 'Inaktiv', '待用', 'غير نشط', NULL),
(76, 'image', 'Image', 'Imagen', 'Image', 'Bild', '图片', 'صورة', NULL),
(77, 'dept/des', 'Dept / of', 'Dpto / de', 'Dept/des', 'Dept / von', '部/中', 'قسم / من', NULL),
(78, 'at_work', 'At Work', 'En el trabajo', 'Au travail', 'Auf Arbeit', '工作中', 'في العمل', NULL),
(79, 'dept/_des', 'Dept / A', 'Dpto / A', 'Dept/ Des', 'Dept / A', '部/ A', 'قسم / A', NULL),
(80, 'deptartment/_designation', 'Deptartment/ Designation', 'Deptartment / Designación', 'Deptartment / Désignation', 'Deptartment / Bezeichnung', 'Deptartment /名称', 'Deptartment / تعيين', NULL),
(81, 'edit_employee', 'Edit Employee', 'Editar Empleado', 'Modifier employé', 'Mitarbeiter bearbeiten', '编辑员工', 'تحرير موظف', NULL),
(82, 'select_image', 'Select Image', 'Seleccionar imagen', 'Sélectionner l\'image', 'Bild auswählen', '选择图片', 'اختر صورة', NULL),
(83, 'remove', 'Remove', 'retirar', 'Retirer', 'Entfernen', '去掉', 'إزالة', NULL),
(84, 'employee_edit', 'Employee Edit', 'Editar empleado', 'employé Modifier', 'Mitarbeiter bearbeiten', '编辑员工', 'موظف تحرير', NULL),
(85, 'department_list', 'Department List', 'Lista departamento', 'Liste Département', 'Abteilung Liste', '部名单', 'قائمة الدائرة', NULL),
(86, 'payroll', 'Payroll', 'Nómina de sueldos', 'Paie', 'Lohn-und Gehaltsabrechnung', '工资表', 'كشف رواتب', NULL),
(87, 'create_payroll', 'Create Payroll', 'crear nómina', 'Créer la paie', 'erstellen Sie Payroll', '建立工资', 'إنشاء الرواتب', NULL),
(88, 'payroll_list', 'Payroll List', 'Lista nómina', 'Liste de paie', 'Abrechnungsliste', '工资清单', 'قائمة الرواتب', NULL),
(89, 'payroll_create', 'Payroll Create', 'Crear nómina', 'paie Créer', 'Abrechnung erstellen', '建立工资', 'الرواتب خلق', NULL),
(90, 'manage_payroll', 'Manage Payroll', 'Manejo de nómina', 'Gérer la paie', 'verwalten Payroll', '工资管理', 'إدارة الرواتب', NULL),
(91, 'select_student', 'Select Student', 'Student Select', 'Sélectionnez étudiant', 'Select-Studenten', '选择学生', 'حدد الطلاب', NULL),
(92, 'month', 'Month', 'Mes', 'Mois', 'Monat', '月', 'شهر', NULL),
(93, 'select_employee', 'Select Employee', 'Seleccione Empleado', 'Sélectionnez employé', 'Wählen Sie Mitarbeiter', '选择Employee', 'حدد الموظف', NULL),
(94, 'year', 'Year', 'Año', 'An', 'Jahr', '年', 'عام', NULL),
(95, 'allowences', 'Allowences', 'Allowences', 'Allowences', 'Allowences', 'Allowences', 'Allowences', NULL),
(96, 'deduction', 'Deduction', 'Deducción', 'Déduction', 'Abzug', '扣除', 'المستقطع', NULL),
(97, 'summary', 'Summary', 'Resumen', 'Résumé', 'Zusammenfassung', '概要', 'ملخص', NULL),
(98, 'basic', 'Basic', 'BASIC', 'De base', 'Basic', '基本', 'الأساسية', NULL),
(99, 'total_allowence', 'Total Allowence', 'total allowence', 'total présence alloués', 'insgesamt Allowence', '总Allowence', 'إجمالي Allowence', NULL),
(100, 'total_deduction', 'Total Deduction', 'Deducción total', 'Déduction totale', 'Gesamtabzug', '扣除总额', 'إجمالي الخصم', NULL),
(101, 'net_salary', 'Net Salary', 'Sueldo neto', 'Salaire net', 'Nettogehalt', '净工资', 'صافي الراتب', NULL),
(102, 'create_payment', 'Create Payment', 'crear Pago', 'Créer paiement', 'erstellen Zahlung', '创建付款', 'إنشاء الدفع', NULL),
(103, 'admin', 'Admin', 'Administración', 'Administrateur', 'Administrator', '联系', 'مشرف', NULL),
(104, 'edit_profile', 'Edit Profile', 'Editar perfil', 'Editer le profil', 'Profil bearbeiten', '编辑个人资料', 'تعديل الملف الشخصي', NULL),
(105, 'change_password', 'Change Password', 'Cambia la contraseña', 'Changer le mot de passe', 'Passwort ändern', '更改密码', 'تغيير كلمة السر', NULL),
(106, 'in_get_phrase', 'In Get Phrase', 'En Get Frase', 'Dans Get Phrase', 'In Get Phrase', '进去短语', 'في الحصول على العبارة', NULL),
(107, 'submit', 'Submit', 'Enviar', 'Soumettre', 'einreichen', '提交', 'عرض', NULL),
(108, 'select_a_department', 'Select A Department', 'Elige un departamento', 'Sélectionnez un département', 'Wählen Sie eine Abteilung', '选择一个部门', 'اختر قسم', NULL),
(109, 'select_a_department_first', 'Select A Department First', 'Elige un departamento Primera', 'Sélectionnez un département Première', 'Wählen Sie eine Abteilung Erste', '选择一个部门第一', 'حدد وزارة الأولى', NULL),
(110, 'daily_attendance', 'Daily Attendance', 'Asistencia diaria', 'présences quotidiennes', 'Tägliche Teilnahme', '日常考勤', 'الحضور اليومي', NULL),
(111, 'daily_atendance', 'Daily Atendance', 'Daily Atendance', 'Daily Atendance', 'Täglich Atendance', '每日Atendance', 'يوميا Atendance', NULL),
(112, 'attendance_report', 'Attendance Report', 'Reporte de asistencia', 'Participation Rapport', 'Teilnahmebericht', '出席报告', 'تقرير الحضور', NULL),
(113, 'manage_attendance', 'Manage Attendance', 'Manejo de Asistencia', 'Gérer Participation', 'verwalten Teilnahme', '考勤管理', 'إدارة الحضور', NULL),
(114, 'class', 'Class', 'Clase', 'Classe', 'Klasse', '类', 'صف دراسي', NULL),
(115, 'select_class', 'Select Class', 'Seleccionar clase', 'Sélectionnez la classe', 'Klasse auswählen', '选择类别', 'حدد فئة', NULL),
(116, 'all_departments', 'All Departments', 'Todos los departamentos', 'Tous les départements', 'Alle Abteilungen', '所有', 'جميع الإدارات', NULL),
(117, 'date', 'Date', 'Fecha', 'Rendez-vous amoureux', 'Datum', '日期', 'تاريخ', NULL),
(118, 'manage_attendance_of', 'Manage Attendance Of', 'Manejo de asistencia de', 'Gérer présence de', 'Verwalten Sie die Teilnahme an', '管理考勤', 'إدارة الحضور من', NULL),
(119, 'attendance_for', 'Attendance For', 'Para la asistencia', 'Participation Pour', 'Die Teilnahme für', '考勤', 'الحضور ل', NULL),
(120, 'reason', 'Reason', 'Razón', 'Raison', 'Grund', '原因', 'السبب', NULL),
(121, 'save_changes', 'Save Changes', 'Guardar cambios', 'Sauvegarder les modifications', 'Änderungen speichern', '保存更改', 'حفظ التغييرات', NULL),
(122, 'undefined', 'Undefined', 'Indefinido', 'Indéfini', 'Undefiniert', '未定义', 'غير محدد', NULL),
(123, 'present', 'Present', 'Presente', 'Présent', 'Geschenk', '当下', 'حاضر', NULL),
(124, 'absent', 'Absent', 'Ausente', 'Absent', 'Abwesend', '缺席', 'غائب', NULL),
(125, 'employees_by_department', 'Employees By Department', 'Empleados por el Departamento', 'Employés Par département', 'Mitarbeiter nach Abteilung', '员工按部门分类', 'الموظفين من قبل وزارة', NULL),
(126, 'select_employees_of_a_department', 'Select Employees Of A Department', 'Seleccionar a los empleados de un departamento', 'Sélectionnez employés d\'un ministère', 'Wählen Sie Mitarbeiter einer Abteilung', '员工选择一个部门', 'حدد الموظفين من وزارة', NULL),
(127, 'all_employees', 'All Employees', 'Todos los empleados', 'Tous les employés', 'Alle Angestellten', '所有员工', 'كل الموظفين', NULL),
(128, 'attendance_updated', 'Attendance Updated', 'La asistencia Actualizado', 'Participation Mise à jour', 'Die Teilnahme Aktualisiert', '出席更新', 'الحضور التحديث', NULL),
(129, 'show_report', 'Show Report', 'Mostrar reporte', 'Rapport d\'émission', 'Bericht zeigen', '展后报告', 'عرض تقرير', NULL),
(130, 'january', 'January', 'enero', 'janvier', 'Januar', '一月', 'كانون الثاني', NULL),
(131, 'february', 'February', 'febrero', 'février', 'Februar', '二月', 'شهر فبراير', NULL),
(132, 'march', 'March', 'marzo', 'Mars', 'März', '游行', 'مارس', NULL),
(133, 'april', 'April', 'abril', 'avril', 'April', '四月', 'أبريل', NULL),
(134, 'may', 'May', 'Mayo', 'Mai', 'Kann', '可能', 'قد', NULL),
(135, 'june', 'June', 'junio', 'juin', 'Juni', '六月', 'يونيو', NULL),
(136, 'july', 'July', 'julio', 'juillet', 'Juli', '七月', 'يوليو', NULL),
(137, 'august', 'August', 'agosto', 'août', 'August', '八月', 'أغسطس', NULL),
(138, 'september', 'September', 'septiembre', 'septembre', 'September', '九月', 'سبتمبر', NULL),
(139, 'october', 'October', 'octubre', 'octobre', 'Oktober', '十月', 'شهر اكتوبر', NULL),
(140, 'november', 'November', 'noviembre', 'novembre', 'November', '十一月', 'شهر نوفمبر', NULL),
(141, 'december', 'December', 'diciembre', 'décembre', 'Dezember', '十二月', 'ديسمبر', NULL),
(142, 'attendance_report_of', 'Attendance Report Of', 'Informe de asistencia de', 'Participation Rapport de', 'Die Teilnahme Bericht der', '出席报告', 'تقرير الحضور من', NULL),
(143, 'attendance_sheet', 'Attendance Sheet', 'Hoja de asistencia', 'Feuille de présence', 'Anwesenheitsliste', '考勤表', 'ورقة الحضور', NULL),
(144, 'students', 'Students', 'Los estudiantes', 'Élèves', 'Studenten', '学生们', 'الطلاب', NULL),
(145, 'print_attendance_sheet', 'Print Attendance Sheet', 'Imprimir la Hoja de Asistencia', 'Imprimer Feuille de présence', 'Drucken Anwesenheits', '打印考勤表', 'طباعة ورقة الحضور', NULL),
(146, 'award', 'Award', 'Premio', 'Prix', 'Vergeben', '奖', 'جائزة', NULL),
(147, 'awards_list', 'Awards List', 'Lista de premios', 'Liste des Prix', 'Auszeichnungen Liste', '获奖名单', 'قائمة الجوائز', NULL),
(148, 'add_new_award', 'Add New Award', 'Agregar nuevo premio', 'Ajouter un nouveau prix', 'New-Award', '添加新奖', 'إضافة جائزة جديدة', NULL),
(149, 'award_name', 'Award Name', 'Nombre Premio', 'Nom Prix', 'Preis-Name', '奖项名称', 'اسم الجائزة', NULL),
(150, 'gift', 'Gift', 'Regalo', 'Cadeau', 'Geschenk', '礼品', 'هدية مجانية', NULL),
(151, 'amount', 'Amount', 'Cantidad', 'Montant', 'Menge', '量', 'كمية', NULL),
(152, 'awarded_employee', 'Awarded Employee', 'Empleado adjudicado', 'employé attribué', 'Ausgezeichnet Mitarbeiter', '授予员工', 'موظف منحت', NULL),
(153, 'add_award', 'Add Award', 'Añadir Premio', 'Ajouter Award', 'Add Award', '添加奖', 'إضافة جائزة', NULL),
(154, 'customer', 'Customer', 'Cliente', 'Client', 'Kunde', '顾客', 'زبون', NULL),
(155, 'select_customer', 'Select Customer', 'Seleccione cliente', 'Sélectionnez client', 'Wählen Sie Kunden', '选择客户', 'حدد العملاء', NULL),
(156, 'select_an_employee', 'Select An Employee', 'Seleccionar un Empleado', 'Sélectionnez un employé', 'Wählen Sie ein Angestellter', '选择一个员工', 'اختيار الموظف', NULL),
(157, 'appointment_date', 'Appointment Date', 'Día de la cita', 'Date de rendez-vous', 'Termin', '约会日期', 'تعيين تاريخ', NULL),
(158, 'data_created_successfully', 'Data Created Successfully', 'Los datos creados con éxito', 'Les données créées avec succès', 'Daten erfolgreich erstellt', '数据创建成功', 'بيانات مكون بنجاح', NULL),
(159, 'edit_award', 'Edit Award', 'Premio Editar', 'Modifier Prix', 'Bearbeiten Auszeichnung', '编辑奖', 'تحرير جائزة', NULL),
(160, 'update', 'Update', 'Actualizar', 'Mettre à jour', 'Aktualisieren', '更新', 'تحديث', NULL),
(161, 'data_updated_successfully', 'Data Updated Successfully', 'Datos actualizados con éxito', 'Mise à jour des données avec succès', 'Daten erfolgreich aktualisiert', '数据更新成功', 'البيانات المحدثة بنجاح', NULL),
(162, 'data_deleted_successfully', 'Data Deleted Successfully', 'Los datos borrados con éxito', 'Données supprimées avec succès', 'Daten erfolgreich gelöscht', '数据已成功删除', 'محذوفة البيانات بنجاح', NULL),
(163, 'expense', 'Expense', 'Gastos', 'Frais', 'Ausgabe', '费用', 'مصروف', NULL),
(164, 'expenses_list', 'Expenses List', 'Lista de los gastos', 'Liste des dépenses', 'Die Aufwendungen Liste', '费用清单', 'قائمة المصروفات', NULL),
(165, 'manage_expenses', 'Manage Expenses', 'gestionar los gastos', 'Gérer les dépenses', 'verwalten Aufwendungen', '管理费用', 'إدارة النفقات', NULL),
(166, 'add_new_expense', 'Add New Expense', 'Añadir nuevo gasto', 'Ajouter New Expense', 'New Expense', '新增费用', 'إضافة حساب جديد', NULL),
(167, 'expense_title', 'Expense Title', 'Título de gastos', 'Dépenses Titre', 'Expense Titel', '费用标题', 'حساب عنوان', NULL),
(168, 'description', 'Description', 'Descripción', 'La description', 'Beschreibung', '描述', 'وصف', NULL),
(169, 'add_expense', 'Add Expense', 'Añadir Gasto', 'Ajouter Expense', 'In Expense', '增加成本', 'إضافة المصروفات', NULL),
(170, 'noticeboard', 'Noticeboard', 'tablón de anuncios', 'Tableau d\'affichage', 'Schwarzes Brett', '公告栏', 'لوح الإعلانات', NULL),
(171, 'noticeboards_list', 'Noticeboards List', 'Lista de los tablones de anuncios', 'Liste des Tableaux d\'affichage', 'Pinnwände Liste', '布告名单', 'قائمة لوحة الإعلانات', NULL),
(172, 'add_new_notice', 'Add New Notice', 'Agregar nuevo aviso', 'Ajouter un nouvel avis', 'New Hinweis', '添加新通知', 'إضافة ملاحظة جديدة', NULL),
(173, 'notice_title', 'Notice Title', 'Título del Anuncio', 'Titre de l\'Avis', 'Titel der', '公告标题', 'عنوان الإشعار', NULL),
(174, 'add_notice', 'Add Notice', 'Añadir Aviso', 'Ajouter l\'avis', 'In Hinweis', '添加通知', 'إضافة إشعار', NULL),
(175, 'edit_notice', 'Edit Notice', 'Editar Aviso', 'Modifier Avis', 'Bearbeiten und Datenschutz', '编辑公告', 'تحرير إشعار', NULL),
(176, 'edit_expense', 'Edit Expense', 'Edición de gastos', 'Modifier Expense', 'Bearbeiten Kosten', '编辑费用', 'تحرير المصاريف', NULL),
(177, 'select_a_month', 'Select A Month', 'Selecciona un mes', 'Sélectionnez un mois', 'Wähle einen Monat', '选择一个月份', 'اختار شهرا', NULL),
(178, 'select_a_year', 'Select A Year', 'Selecciona un año', 'Sélectionnez une année', 'Wählen Sie ein Jahr', '选择一个年份', 'اختر سنة', NULL),
(179, 'type', 'Type', 'Tipo', 'Type', 'Art', '类型', 'اكتب', NULL),
(180, 'add_allowance', 'Add Allowance', 'Añadir Provisión', 'Ajouter allocation', 'In Allowance', '加入津贴', 'إضافة بدل', NULL),
(181, 'allowances', 'Allowances', 'Los derechos de emisión', 'indemnités', 'Allowances', '津贴', 'البدلات', NULL),
(182, 'deductions', 'Deductions', 'deducciones', 'Déductions', 'Abzüge', '扣除', 'الخصومات', NULL),
(183, 'add_deduction', 'Add Deduction', 'Añadir Deducción', 'Ajouter Déduction', 'In Abzug', '添加扣除', 'إضافة خصم', NULL),
(184, 'total_allowance', 'Total Allowance', 'Asignación total', 'allocation totale', 'insgesamt Allowance', '总津贴', 'إجمالي مخصصات', NULL),
(185, 'calculate_total_allowance', 'Calculate Total Allowance', 'Calcula Permiso total', 'Calculer Allocation totale', 'Berechnen Gesamt Allowance', '计算总津贴', 'حساب إجمالي مخصصات', NULL),
(186, 'calculate_total_deduction', 'Calculate Total Deduction', 'Calcula deducción total', 'Calculer Déduction totale', 'Berechnen Gesamtabzug', '计算总扣除', 'حساب مجموع خصم', NULL),
(187, 'unpaid', 'Unpaid', 'No pagado', 'Non payé', 'unbezahlt', '未付', 'غير مدفوع', NULL),
(188, 'basic_salary', 'Basic Salary', 'Salario base', 'Salaire de base', 'Grundgehalt', '基础工资', 'راتب اساسي', NULL),
(189, 'view_payroll_details', 'View Payroll Details', 'Ver detalles de nómina', 'Voir les détails de la paie', 'Ansicht Abrechnungsinformationen', '查看详细工资单', 'عرض تفاصيل الرواتب', NULL),
(190, 'payroll_code', 'Payroll Code', 'Código de nómina', 'code de la paie', 'Payroll-Code', '工资码', 'كود الرواتب', NULL),
(191, 'payment_to', 'Payment To', 'Pago Para', 'Paiement à', 'Zahlung Um', '支付', 'دفع ل', NULL),
(192, 'bill_to', 'Bill To', 'Cobrar a', 'Facturer', 'Gesetzesentwurf für', '记账到', 'فاتورة الى', NULL),
(193, 'allowance_summary', 'Allowance Summary', 'Resumen subsidio', 'Résumé de l\'allocation', 'Allowance Zusammenfassung', '摘要津贴', 'ملخص بدل', NULL),
(194, 'print_payroll_details', 'Print Payroll Details', 'Imprimir detalles de nómina', 'Imprimer Paie Détails', 'Drucken Abrechnungsinformationen', '打印工资单详细信息', 'طباعة تفاصيل الرواتب', NULL),
(195, 'deduction_summary', 'Deduction Summary', 'Resumen deducción', 'Déduction Résumé', 'Deduktion Zusammenfassung', '扣除摘要', 'ملخص خصم', NULL),
(196, 'no_allowances', 'No Allowances', 'No hay derechos de emisión', 'Aucun indemnités', 'Keine Allowances', '没有津贴', 'لا البدلات', NULL),
(197, 'payroll_summary', 'Payroll Summary', 'Resumen de nómina', 'paie Résumé', 'Payroll Zusammenfassung', '工资汇总', 'ملخص الرواتب', NULL),
(198, 'mark_as_paid', 'Mark As Paid', 'Marcar como pago', 'Mark Comme Paid', 'Mark als bezahlt', '标记为付费', 'مارك والمدفوع', NULL),
(199, 'paid', 'Paid', 'Pagado', 'Payé', 'Bezahlt', '付费', 'دفع', NULL),
(200, 'employee_dashboard', 'Employee Dashboard', 'Tablero de instrumentos del empleado', 'Tableau de bord de l\'employé', 'Mitarbeiter-Dashboard', '员工仪表板', 'لوحة موظف', NULL),
(201, 'leave', 'Leave', 'Salir', 'Laisser', 'Verlassen', '离开', 'غادر', NULL),
(202, 'leaves_list', 'Leaves List', 'deja la Lista', 'Feuilles Liste', 'Blätter Liste', '叶名单', 'يترك قائمة', NULL),
(203, 'add_new_leave', 'Add New Leave', 'Añadir Nueva Dejar', 'Ajouter un nouveau congé', 'New Leave', '添加新休假', 'إضافة اترك جديد', NULL),
(204, 'start_date', 'Start Date', 'Fecha de inicio', 'Date de début', 'Anfangsdatum', '开始日期', 'تاريخ البدء', NULL),
(205, 'end_date', 'End Date', 'Fecha final', 'Date de fin', 'Enddatum', '结束日期', 'تاريخ الانتهاء', NULL),
(206, 'leave_list', 'Leave List', 'saldría de la lista', 'Laissez Liste', 'Lassen Sie Liste', '离开列表', 'قائمة مغادرة', NULL),
(207, 'add_leave', 'Add Leave', 'Añadir Dejar', 'Ajouter congé', 'In Leave', '添加休假', 'إضافة الإجازة', NULL),
(208, 'pending', 'Pending', 'Pendiente', 'en attendant', 'steht aus', '有待', 'قيد الانتظار', NULL),
(209, 'edit_leave', 'Edit Leave', 'Editar Dejar', 'Modifier congé', 'Bearbeiten Leave', '编辑休假', 'تحرير الإجازة', NULL),
(210, 'approve', 'Approve', 'Aprobar', 'Approuver', 'Genehmigen', '批准', 'يوافق', NULL),
(211, 'decline', 'Decline', 'Disminución', 'Déclin', 'Ablehnen', '下降', 'انخفاض', NULL),
(212, 'leave_approved_successfully', 'Leave Approved Successfully', 'Deja Aprobado con éxito', 'Laissez approuvé avec succès', 'Lassen Sie genehmigt Erfolgreich', '离开批准成功', 'ترك المعتمدة بنجاح', NULL),
(213, 'approved', 'Approved', 'Aprobado', 'Approuvé', 'Genehmigt', '批准', 'وافق', NULL),
(214, 'leave_declined_successfully', 'Leave Declined Successfully', 'Deja Rehusó con éxito', 'Laissez Décliné avec succès', 'Lassen Abgelehnt Erfolgreich', '离开拒绝成功', 'ترك المرفوضة بنجاح', NULL),
(215, 'declined', 'Declined', 'disminuido', 'Diminué', 'Abgelehnt', '下降', 'رفض', NULL),
(216, 'message', 'Message', 'Mensaje', 'Message', 'Nachricht', '信息', 'رسالة', NULL),
(217, 'private_messaging', 'Private Messaging', 'Mensajería privada', 'Messagerie privée', 'Private Nachrichten', '悄悄话', 'رسائل خاصة', NULL),
(218, 'messages', 'Messages', 'mensajes', 'Messages', 'Nachrichten', '消息', 'رسائل', NULL),
(219, 'new_message', 'New Message', 'Nuevo mensaje', 'Nouveau message', 'Neue Nachricht', '新消息', 'رسالة جديدة', NULL),
(220, 'write_new_message', 'Write New Message', 'Escribir un nuevo mensaje', 'Ecrire un nouveau message', 'Neue Nachricht schreiben', '我要留言', 'إرسال رسالة جديدة', NULL),
(221, 'recipient', 'Recipient', 'Recipiente', 'Bénéficiaire', 'Empfänger', '接受者', 'مستلم', NULL),
(222, 'write_your_message', 'Write Your Message', 'Escribe tu mensaje', 'Rédigez votre message', 'Schreiben Sie Ihre Nachricht', '填写您的留言', 'إرسال رسالتك', NULL),
(223, 'send', 'Send', 'Enviar', 'Envoyer', 'Senden', '发送', 'إرسال', NULL),
(224, 'message_sent!', 'Message Sent!', '¡Mensaje enviado!', 'Message envoyé!', 'Nachricht gesendet!', '邮件已发送！', 'تم الارسال!', NULL),
(225, 'reply_message', 'Reply Message', 'Mensaje de respuesta', 'Message de réponse', 'Antworten Nachricht', '回复消息', 'رسالة الرد', NULL),
(226, 'select_a_message_to_read', 'Select A Message To Read', 'Seleccionar un mensaje para leerlo', 'Sélectionnez un message à lire', 'Wählen Sie eine Email zu lesen', '选择一个消息要阅读', 'اختر رسالة إلى قراءة', NULL),
(227, 'select_an_admin', 'Select An Admin', 'Seleccione un administrador', 'Sélectionnez un admin', 'Wählen Sie ein Admin', '选择一个管理员', 'تحديد المسير', NULL),
(228, 'attendance', 'Attendance', 'Asistencia', 'Présence', 'Teilnahme', '护理', 'الحضور', NULL),
(229, 'employees', 'Employees', 'Empleados', 'Employés', 'Mitarbeiter', '雇员', 'الموظفين', NULL),
(230, 'notice_list', 'Notice List', 'Lista aviso', 'Liste des avis', 'Merkzettel', '名单的通知', 'قائمة إشعار', NULL),
(231, 'choose_new', 'Choose New', 'Elija Nuevo', 'Choisissez Nouveau', 'wählen Sie Neu', '选择新', 'اختيار جديد', NULL),
(232, 'download_previous_file', 'Download Previous File', 'Descargar el archivo anterior', 'Télécharger Fichier précédent', 'Download Vorherige Datei', '下载上的文件', 'تحميل الملف السابق', NULL),
(233, 'profile', 'Profile', 'Perfil', 'Profil', 'Profil', '轮廓', 'الملف الشخصي', NULL),
(234, 'account', 'Account', 'Cuenta', 'Compte', 'Konto', '帐户', 'الحساب', NULL),
(235, 'current_password', 'Current Password', 'contraseña actual', 'Mot de passe actuel', 'Aktuelles Passwort', '当前密码', 'كلمة السر الحالية', NULL),
(236, 'new_password', 'New Password', 'nueva contraseña', 'nouveau mot de passe', 'Neues Kennwort', '新密码', 'كلمة السر الجديدة', NULL),
(237, 'confirm_new_password', 'Confirm New Password', 'Confirmar nueva contraseña', 'Confirmer le nouveau mot de passe', 'Bestätige neues Passwort', '确认新密码', 'تأكيد كلمة المرور الجديدة', NULL),
(238, 'password_mismatch', 'Password Mismatch', 'Contraseña no coincide', 'Non concordance des mots de passe', 'Die Passwörter stimmen nicht überein', '密码不匹配', 'عدم تطابق كلمه المرور', NULL),
(239, 'password_updated', 'Password Updated', 'Contraseña actualiza', 'Mot de passe mis à jour', 'Passwort aktualisiert', '密码更新', 'تم تحديث كلمة السر', NULL),
(240, 'manage_profile', 'Manage Profile', 'administrar perfil', 'Gérer le profil', 'Profil verwalten', '管理配置文件', 'إدارة الملف الشخصي', NULL),
(241, 'update_profile', 'Update Profile', 'Actualización del perfil', 'Mettre à jour le profil', 'Profil aktualisieren', '更新个人信息', 'تحديث الملف', NULL),
(242, 'account_updated', 'Account Updated', 'cuenta Actualizado', 'compte Mise à jour', 'Konto aktualisiert', '帐户更新', 'حساب التحديث', NULL),
(243, 'update_password', 'Update Password', 'Actualiza contraseña', 'Mise à jour Mot de passe', 'Kennwort aktualisieren', '更新密码', 'تطوير كلمة السر', NULL),
(244, 'reason_of_absence', 'Reason Of Absence', 'Motivo de Ausencia', 'Raison de l\'absence', 'Absenzgrund', '原因缺席', 'سبب الغياب', NULL),
(245, 'total_employees', 'Total Employees', 'Empleados Totales', 'Nombre total d\'employés', 'insgesamt Mitarbeiter', '员工总数', 'عدد الموظفي', NULL),
(246, 'filter', 'Filter', 'Filtrar', 'Filtre', 'Filter', '过滤', 'منقي', NULL),
(247, 'mark_all_present', 'Mark All Present', 'Marcar todos los presentes', 'Mark All Present', 'Mark All Gegenwart', '马克所有在场', 'علامة جميع الحاضرين', NULL),
(248, 'mark_all_absent', 'Mark All Absent', 'Marcar todo Ausente', 'Mark All Absent', 'Mark All Absent', '标记全部缺席', 'إجعل كل غائب', NULL),
(249, 'total_presence', 'Total Presence', 'Presencia total', 'Présence totale', 'insgesamt Präsenz', '总存在', 'مجموع الحضور', NULL),
(250, 'total_absence', 'Total Absence', 'Ausencia total', 'Absence totale', 'insgesamt Abwesenheit', '完全没有', 'مجموع الغياب', NULL),
(251, 'employee_profile', 'Employee Profile', 'Perfil de empleado', 'Profil des employés', 'Mitarbeiterprofil', '员工档案', 'الملف موظف', NULL),
(252, 'father_name', 'Father Name', 'Nombre del Padre', 'Nom du père', 'Der Name des Vaters', '父亲姓名', 'اسم الأب', NULL),
(253, 'download', 'Download', 'Descargar', 'Télécharger', 'Herunterladen', '下载', 'تحميل', NULL),
(254, 'search', 'Search', 'Buscar', 'Chercher', 'Suche', '搜索', 'بحث', NULL),
(255, 'no_available_data', 'No Available Data', 'No se dispone de datos', 'Non Disponible données', 'Keine Daten verfügbar', '无可用数据', 'لا توجد بيانات', NULL),
(256, 'payslip', 'Payslip', 'recibo de sueldo', 'Fiche de paie', 'payslip', '工资单', 'قسيمة الدفع', NULL),
(257, 'create_payslip', 'Create Payslip', 'crear Hoja de sueldo', 'Créer Payslip', 'erstellen Lohnzettel', '创建工资单', 'إنشاء قسيمة الدفع', NULL),
(258, 'payslip_list', 'Payslip List', 'Lista nómina', 'Liste Payslip', 'payslip Liste', '工资单列表', 'قائمة قسيمة الدفع', NULL),
(259, 'payslip_code', 'Payslip Code', 'Código nómina', 'code de Payslip', 'payslip-Code', '工资单码', 'كود قسيمة الدفع', NULL),
(260, 'view_payslip_details', 'View Payslip Details', 'Ver detalles Hoja de sueldo', 'Voir Payslip Détails', 'Ansicht Details der Lohnzettel', '查看工资单详细信息', 'عرض تفاصيل قسيمة الدفع', NULL),
(261, 'print_payslip_details', 'Print Payslip Details', 'Imprimir Hoja de sueldo detalles', 'Imprimer Payslip Détails', 'Drucken Details der Lohnzettel', '打印工资单详细信息', 'طباعة تفاصيل قسيمة الدفع', NULL),
(262, 'event_schedule', 'Event Schedule', 'Programa del evento', 'Horaire de l\'événement', 'Veranstaltungskalender', '活动日程', 'الجدول الزمني للفعاليات', NULL),
(263, 'welcome', 'Welcome', 'Bienvenido', 'Bienvenue', 'Herzlich willkommen', '欢迎', 'أهلا بك', NULL),
(264, 'total_employee', 'Total Employee', 'total del empleado', 'Nombre total d\'employés', 'insgesamt Mitarbeiter', '员工总数', 'مجموع الموظفين', NULL),
(265, 'present_today', 'Present Today', 'Hoy en día presente', 'Présent Aujourd\'hui', 'Gegenwart Heute', '今天在座', 'اليوم الحالي', NULL),
(266, 'on_leave', 'On Leave', 'en licencia', 'En congé', 'Auf Urlaub', '休假', 'عند المغادرة', NULL),
(267, 'settings', 'Settings', 'ajustes', 'Paramètres', 'Einstellungen', '设置', 'إعدادات', NULL),
(268, 'general_settings', 'General Settings', 'Configuración general', 'réglages généraux', 'Allgemeine Einstellungen', '常规设置', 'الاعدادات العامة', NULL),
(269, 'language_settings', 'Language Settings', 'Ajustes de idioma', 'Paramètres de langue', 'Spracheinstellungen', '语言设定', 'اعدادات اللغة', NULL),
(270, 'system_settings', 'System Settings', 'Ajustes del sistema', 'Les paramètres du système', 'Systemeinstellungen', '系统设置', 'اعدادات النظام', NULL),
(271, 'system_name', 'System Name', 'Nombre del sistema', 'Name System', 'Systemname', '系统名称', 'اسم النظام', NULL),
(272, 'system_title', 'System Title', 'sistema de Título', 'système Titre', 'System-Titel', '系统标题', 'عنوان النظام', NULL),
(273, 'address', 'Address', 'Dirección', 'Adresse', 'Adresse', '地址', 'عنوان', NULL),
(274, 'system_email', 'System Email', 'sistema de correo electrónico', 'système Email', 'System-E-Mail', '电子邮件系统', 'نظام البريد الإلكتروني', NULL),
(275, 'language', 'Language', 'Idioma', 'La langue', 'Sprache', '语言', 'لغة', NULL),
(276, 'text_align', 'Text Align', 'Texto alineado', 'Text Align', 'Textausrichtung', '文本对齐', 'محاذاة النص', NULL),
(277, 'upload_logo', 'Upload Logo', 'Subir Logo', 'Télécharger Logo', 'Logo hochladen', '上传徽标', 'تحميل الشعار', NULL),
(278, 'upload', 'Upload', 'Subir', 'Télécharger', 'Hochladen', '上传', 'تحميل', NULL),
(279, 'data_updated', 'Data Updated', 'datos actualizados', 'Mise à jour des données', 'Daten aktualisiert', '数据更新', 'تم تحديث البيانات', NULL),
(280, 'settings_updated', 'Settings Updated', 'Ajustes actualizan', 'Paramètres mis à jour', 'Einstellungen aktualisiert', '设置更新', 'إعدادات التحديث', NULL),
(281, 'data_updted_successfully', 'Data Updted Successfully', 'Datos Updted con éxito', 'Données Updted avec succès', 'Daten Updted Erfolgreich', '数据Updted成功', 'Updted البيانات بنجاح', NULL),
(282, 'reset_password', 'Reset Password', 'Restablecer la contraseña', 'réinitialiser le mot de passe', 'Passwort zurücksetzen', '重设密码', 'إعادة تعيين كلمة المرور', NULL),
(283, 'return_to_login_page', 'Return To Login Page', 'Volver a inicio página', 'Retour à la page de connexion', 'Zurück zur Login-Seite', '返回到登录页面', 'العودة إلى صفحة تسجيل الدخول', NULL),
(284, 'manage_language', 'Manage Language', 'Manejo de Lenguaje', 'Gérer Langue', 'verwalten von Sprach', '管理语言', 'إدارة اللغة', NULL),
(285, 'phrase_list', 'Phrase List', 'Lista frase', 'Liste Phrase', 'Phrasenliste', '短语列表', 'قائمة العبارة', NULL),
(286, 'add_phrase', 'Add Phrase', 'Añadir Frase', 'Ajouter Phrase', 'In Phrase', '添加词组', 'إضافة عبارة', NULL),
(287, 'add_language', 'Add Language', 'Agregar idioma', 'Ajouter une langue', 'Sprache hinzufügen', '添加语言', 'إضافة اللغة', NULL),
(288, 'option', 'Option', 'Opción', 'Option', 'Option', '选项', 'اختيار', NULL),
(289, 'edit_phrase', 'Edit Phrase', 'Editar Frase', 'Modifier Phrase', 'Bearbeiten Phrase', '编辑短语', 'تحرير العبارة', NULL),
(290, 'delete_language', 'Delete Language', 'eliminar idioma', 'Supprimer Langue', 'Sprache löschen', '删除语言', 'حذف اللغة', NULL),
(291, 'phrase', 'Phrase', 'Frase', 'Phrase', 'Phrase', '短语', 'العبارة', NULL),
(292, 'update_phrase', '', 'actualización Frase', 'Mise à jour Phrase', 'Update-Phrase', '更新短语', 'تحديث العبارة', NULL),
(293, 'language_list', '', '', '', '', '', '', NULL),
(294, 'payslip_summary', '', '', '', '', '', '', NULL),
(295, 'recruitment', '', '', '', '', '', '', NULL),
(296, 'vacancies', '', '', '', '', '', '', NULL),
(297, 'applications', '', '', '', '', '', '', NULL),
(298, 'manage_vacancies', '', '', '', '', '', '', NULL),
(299, 'add_new_vacancy', '', '', '', '', '', '', NULL),
(300, 'position_name', '', '', '', '', '', '', NULL),
(301, 'number_of_vacancies', '', '', '', '', '', '', NULL),
(302, 'last_date_of_application', '', '', '', '', '', '', NULL),
(303, 'add_vacancy', '', '', '', '', '', '', NULL),
(304, 'edit_vacancy', '', '', '', '', '', '', NULL),
(305, 'application_list', '', '', '', '', '', '', NULL),
(306, 'add_new_application', '', '', '', '', '', '', NULL),
(307, 'applicant_name', '', '', '', '', '', '', NULL),
(308, 'position', '', '', '', '', '', '', NULL),
(309, 'application_date', '', '', '', '', '', '', NULL),
(310, 'add_application', '', '', '', '', '', '', NULL),
(311, 'select_a_position', '', '', '', '', '', '', NULL),
(312, 'applied', '', '', '', '', '', '', NULL),
(313, 'on_review', '', '', '', '', '', '', NULL),
(314, 'interview', '', '', '', '', '', '', NULL),
(315, 'offered', '', '', '', '', '', '', NULL),
(316, 'hired', '', '', '', '', '', '', NULL),
(317, 'edit_application', '', '', '', '', '', '', NULL),
(318, 'vacancy_list', '', '', '', '', '', '', NULL),
(319, 'update_product', '', '', '', '', '', '', NULL),
(320, 'file', '', '', '', '', '', '', NULL),
(321, 'install_update', '', '', '', '', '', '', NULL),
(322, 'product_updated_successfully', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(323, 'forgot_your_password', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(324, 'login_info', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(325, 'job_history', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(326, 'compnay_name', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(327, 'add_another', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(328, 'add_another_compnay', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(329, 'complaints/dispute', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(330, 'add_complaint', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(331, 'title', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(332, 'complaint_added_successfully', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(333, 'edit_complaint', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(334, 'complaint_updated_successfully', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(335, 'purchase_code', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(336, 'failed_to_reset_password', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(337, 'check_your_email_for_new_password', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

DROP TABLE IF EXISTS `leave`;
CREATE TABLE `leave` (
  `leave_id` int(11) NOT NULL,
  `leave_code` longtext,
  `user_id` int(11) DEFAULT NULL,
  `start_date` longtext,
  `end_date` longtext,
  `reason` longtext,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `message_thread_code` longtext,
  `message` longtext,
  `sender` longtext,
  `timestamp` longtext,
  `read_status` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message_thread`
--

DROP TABLE IF EXISTS `message_thread`;
CREATE TABLE `message_thread` (
  `message_thread_id` int(11) NOT NULL,
  `message_thread_code` longtext COLLATE utf8_unicode_ci,
  `sender` longtext COLLATE utf8_unicode_ci,
  `reciever` longtext COLLATE utf8_unicode_ci,
  `last_message_timestamp` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `noticeboard`
--

DROP TABLE IF EXISTS `noticeboard`;
CREATE TABLE `noticeboard` (
  `noticeboard_id` int(11) NOT NULL,
  `noticeboard_code` longtext,
  `title` longtext,
  `description` longtext,
  `status` int(11) DEFAULT NULL,
  `date` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

DROP TABLE IF EXISTS `payroll`;
CREATE TABLE `payroll` (
  `payroll_id` int(11) NOT NULL,
  `payroll_code` longtext,
  `user_id` int(11) DEFAULT NULL,
  `allowances` longtext,
  `deductions` longtext,
  `date` longtext,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `settings_id` int(11) NOT NULL,
  `type` longtext,
  `description` longtext
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`settings_id`, `type`, `description`) VALUES
(1, 'system_name', NULL),
(2, 'system_title', 'Human Resource Manager'),
(3, 'address', 'Sydney, Australia'),
(4, 'phone', '34343434'),
(7, 'system_email', 'admin@email.com'),
(11, 'language', 'english'),
(22, 'purchase_code', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_code` longtext,
  `name` longtext,
  `father_name` longtext,
  `phone` longtext,
  `date_of_birth` longtext,
  `gender` longtext,
  `local_address` longtext,
  `permanent_address` longtext,
  `nationality` longtext,
  `martial_status` longtext,
  `email` longtext,
  `password` longtext,
  `department_id` int(11) DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `date_of_joining` longtext,
  `joining_salary` longtext,
  `status` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `date_of_leaving` longtext,
  `bank_id` int(11) DEFAULT NULL,
  `document_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vacancy`
--

DROP TABLE IF EXISTS `vacancy`;
CREATE TABLE `vacancy` (
  `vacancy_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci,
  `number_of_vacancies` int(11) DEFAULT NULL,
  `last_date` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`application_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `award`
--
ALTER TABLE `award`
  ADD PRIMARY KEY (`award_id`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`complaints_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`designation_id`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`document_id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `holiday`
--
ALTER TABLE `holiday`
  ADD PRIMARY KEY (`holiday_id`);

--
-- Indexes for table `job_history`
--
ALTER TABLE `job_history`
  ADD PRIMARY KEY (`job_history_id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`phrase_id`);

--
-- Indexes for table `leave`
--
ALTER TABLE `leave`
  ADD PRIMARY KEY (`leave_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `message_thread`
--
ALTER TABLE `message_thread`
  ADD PRIMARY KEY (`message_thread_id`);

--
-- Indexes for table `noticeboard`
--
ALTER TABLE `noticeboard`
  ADD PRIMARY KEY (`noticeboard_id`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`payroll_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vacancy`
--
ALTER TABLE `vacancy`
  ADD PRIMARY KEY (`vacancy_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `award`
--
ALTER TABLE `award`
  MODIFY `award_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `complaints_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `designation_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `document_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `holiday`
--
ALTER TABLE `holiday`
  MODIFY `holiday_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `job_history`
--
ALTER TABLE `job_history`
  MODIFY `job_history_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `phrase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=338;
--
-- AUTO_INCREMENT for table `leave`
--
ALTER TABLE `leave`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `message_thread`
--
ALTER TABLE `message_thread`
  MODIFY `message_thread_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `noticeboard`
--
ALTER TABLE `noticeboard`
  MODIFY `noticeboard_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `payroll_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vacancy`
--
ALTER TABLE `vacancy`
  MODIFY `vacancy_id` int(11) NOT NULL AUTO_INCREMENT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
