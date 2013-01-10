-- MySQL dump 10.13  Distrib 5.5.16, for Win32 (x86)
--
-- Host: localhost    Database: xuar
-- ------------------------------------------------------
-- Server version	5.5.16

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `absence_factor`
--

DROP TABLE IF EXISTS `absence_factor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `absence_factor` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `LectureUnit_id` int(10) unsigned NOT NULL,
  `Person_id` int(10) unsigned NOT NULL,
  `ActivityType_id` int(10) unsigned NOT NULL COMMENT 'alias Lookup_id',
  `Activity_id` int(11) DEFAULT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lecture_XAF_fk_XLU_idx` (`LectureUnit_id`),
  KEY `lecture_XAF_fk_XP_idx` (`Person_id`),
  KEY `lecture_XAF_fk_XAF000_idx` (`RevisedRow_id`),
  KEY `lecture_XAF_fk_XL_idx` (`ActivityType_id`),
  CONSTRAINT `lecture_XAF_fk_XAF000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `absence_factor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `lecture_XAF_fk_XL` FOREIGN KEY (`ActivityType_id`) REFERENCES `lookup` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `lecture_XAF_fk_XLU` FOREIGN KEY (`LectureUnit_id`) REFERENCES `lecture_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `lecture_XAF_fk_XP` FOREIGN KEY (`Person_id`) REFERENCES `person` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `absence_factor`
--

LOCK TABLES `absence_factor` WRITE;
/*!40000 ALTER TABLE `absence_factor` DISABLE KEYS */;
/*!40000 ALTER TABLE `absence_factor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `additional_property`
--

DROP TABLE IF EXISTS `additional_property`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `additional_property` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `EntityType_id` int(10) unsigned NOT NULL COMMENT 'alias Lookup_id',
  `Entity_id` int(10) unsigned NOT NULL,
  `PropertyType_id` int(10) unsigned NOT NULL,
  `value` varchar(45) NOT NULL,
  `StartDate` date DEFAULT NULL,
  `EndDate` date DEFAULT NULL,
  `ReferenceEntityType_id` int(10) unsigned DEFAULT NULL COMMENT 'alias Lookup_id',
  `ReferenceEntity_id` int(10) unsigned DEFAULT NULL,
  `DocumentBundle_id` int(10) unsigned DEFAULT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `global_XAP_uq` (`EntityType_id`,`PropertyType_id`,`value`),
  KEY `global_XAP_fk_XPT_idx` (`PropertyType_id`),
  KEY `global_XAP_fk_XAP000_idx` (`RevisedRow_id`),
  KEY `global_XAP_fk_XDB_idx` (`DocumentBundle_id`),
  KEY `global_XAP_fk_XL1_idx` (`EntityType_id`),
  KEY `global_XAP_fk_XL2_idx` (`ReferenceEntityType_id`),
  CONSTRAINT `global_XAP_fk_XAP000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `additional_property` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `global_XAP_fk_XDB` FOREIGN KEY (`DocumentBundle_id`) REFERENCES `document_bundle` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `global_XAP_fk_XL1` FOREIGN KEY (`EntityType_id`) REFERENCES `lookup` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `global_XAP_fk_XL2` FOREIGN KEY (`ReferenceEntityType_id`) REFERENCES `lookup` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `global_XAP_fk_XPT` FOREIGN KEY (`PropertyType_id`) REFERENCES `property_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `additional_property`
--

LOCK TABLES `additional_property` WRITE;
/*!40000 ALTER TABLE `additional_property` DISABLE KEYS */;
/*!40000 ALTER TABLE `additional_property` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assessment_set`
--

DROP TABLE IF EXISTS `assessment_set`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assessment_set` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CourseUnit_id` int(10) unsigned NOT NULL,
  `Name` varchar(45) NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `assessment_XAS_uq` (`CourseUnit_id`,`Name`),
  KEY `assessment_XAS_fk_XCU_idx` (`CourseUnit_id`),
  KEY `assessment_XAS_fk_XAS000_idx` (`RevisedRow_id`),
  CONSTRAINT `assessment_XAS_fk_XAS000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `assessment_set` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `assessment_XAS_fk_XCU` FOREIGN KEY (`CourseUnit_id`) REFERENCES `course_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assessment_set`
--

LOCK TABLES `assessment_set` WRITE;
/*!40000 ALTER TABLE `assessment_set` DISABLE KEYS */;
/*!40000 ALTER TABLE `assessment_set` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assessment_set_association`
--

DROP TABLE IF EXISTS `assessment_set_association`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assessment_set_association` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `PlannedAssessmentSet_id` int(10) unsigned NOT NULL COMMENT 'alias AssessmentSet_id',
  `ActedAssessmentSet_id` int(10) unsigned NOT NULL COMMENT 'alias AssessmentSet_id',
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `plan_XASA_fk_XAS1_idx` (`PlannedAssessmentSet_id`),
  KEY `plan_XASA_fk_XAS2_idx` (`ActedAssessmentSet_id`),
  CONSTRAINT `plan_XASA_fk_XAS1` FOREIGN KEY (`PlannedAssessmentSet_id`) REFERENCES `assessment_set` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `plan_XASA_fk_XAS2` FOREIGN KEY (`ActedAssessmentSet_id`) REFERENCES `assessment_set` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assessment_set_association`
--

LOCK TABLES `assessment_set_association` WRITE;
/*!40000 ALTER TABLE `assessment_set_association` DISABLE KEYS */;
/*!40000 ALTER TABLE `assessment_set_association` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assessment_set_conversion`
--

DROP TABLE IF EXISTS `assessment_set_conversion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assessment_set_conversion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `OldAssessmentSet_id` int(10) unsigned DEFAULT NULL,
  `NewAssessmentSet_id` int(10) unsigned NOT NULL,
  `Person_id` int(10) unsigned NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `conversion_XASC_fk_XAS1_idx` (`OldAssessmentSet_id`),
  KEY `conversion_XASC_fk_XAS2_idx` (`NewAssessmentSet_id`),
  KEY `conversion_XASC_fk_XP_idx` (`Person_id`),
  KEY `conversion_XASC_fk_XASC000_idx` (`RevisedRow_id`),
  CONSTRAINT `conversion_XASC_fk_XAS1` FOREIGN KEY (`OldAssessmentSet_id`) REFERENCES `assessment_set` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `conversion_XASC_fk_XAS2` FOREIGN KEY (`NewAssessmentSet_id`) REFERENCES `assessment_set` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `conversion_XASC_fk_XASC000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `assessment_set_conversion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `conversion_XASC_fk_XP` FOREIGN KEY (`Person_id`) REFERENCES `person` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assessment_set_conversion`
--

LOCK TABLES `assessment_set_conversion` WRITE;
/*!40000 ALTER TABLE `assessment_set_conversion` DISABLE KEYS */;
/*!40000 ALTER TABLE `assessment_set_conversion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assessment_set_rule`
--

DROP TABLE IF EXISTS `assessment_set_rule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assessment_set_rule` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `AssessmentSet_id` int(10) unsigned NOT NULL,
  `Formula` varchar(45) NOT NULL,
  `PlannedStatus` tinyint(1) NOT NULL,
  `UsedStatus` tinyint(1) NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `report_XASR_uq1` (`AssessmentSet_id`,`Formula`,`PlannedStatus`),
  UNIQUE KEY `report_XASR_uq2` (`AssessmentSet_id`,`Formula`,`UsedStatus`),
  KEY `report_XASR_fk_XAS_idx` (`AssessmentSet_id`),
  KEY `report_XASR_fk_XASR000_idx` (`RevisedRow_id`),
  CONSTRAINT `report_XASR_fk_XAS` FOREIGN KEY (`AssessmentSet_id`) REFERENCES `assessment_set` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `report_XASR_fk_XASR000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `assessment_set_rule` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assessment_set_rule`
--

LOCK TABLES `assessment_set_rule` WRITE;
/*!40000 ALTER TABLE `assessment_set_rule` DISABLE KEYS */;
/*!40000 ALTER TABLE `assessment_set_rule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assessment_set_value`
--

DROP TABLE IF EXISTS `assessment_set_value`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assessment_set_value` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `AssessmentSet_id` int(10) unsigned NOT NULL,
  `Student_id` int(10) unsigned NOT NULL,
  `Grade` varchar(2) NOT NULL,
  `AdjustedStatus` tinyint(1) NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `report_XASV_uq` (`AssessmentSet_id`,`Student_id`,`Grade`,`AdjustedStatus`),
  KEY `report_XASV_fk_XAS_idx` (`AssessmentSet_id`),
  KEY `report_XASV_fk_XASV000_idx` (`RevisedRow_id`),
  KEY `report_XASV_fk_XP_idx` (`Student_id`),
  CONSTRAINT `report_XASV_fk_XAS` FOREIGN KEY (`AssessmentSet_id`) REFERENCES `assessment_set` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `report_XASV_fk_XASV000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `assessment_set_value` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `report_XASV_fk_XP` FOREIGN KEY (`Student_id`) REFERENCES `person` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assessment_set_value`
--

LOCK TABLES `assessment_set_value` WRITE;
/*!40000 ALTER TABLE `assessment_set_value` DISABLE KEYS */;
/*!40000 ALTER TABLE `assessment_set_value` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assessment_unit`
--

DROP TABLE IF EXISTS `assessment_unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assessment_unit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `AssessmentSet_id` int(10) unsigned NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Occurrence_id` int(10) unsigned NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `assessment_XAU_uq` (`AssessmentSet_id`,`Occurrence_id`),
  KEY `assessment_XAU_fk_XAS_idx` (`AssessmentSet_id`),
  KEY `assessment_XAU_fk_XAU000_idx` (`RevisedRow_id`),
  KEY `assessment_XAU_fk_XO_idx` (`Occurrence_id`),
  CONSTRAINT `assessment_XAU_fk_XAS` FOREIGN KEY (`AssessmentSet_id`) REFERENCES `assessment_set` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `assessment_XAU_fk_XAU000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `assessment_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `assessment_XAU_fk_XO` FOREIGN KEY (`Occurrence_id`) REFERENCES `lecture_unit_occurrence` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assessment_unit`
--

LOCK TABLES `assessment_unit` WRITE;
/*!40000 ALTER TABLE `assessment_unit` DISABLE KEYS */;
/*!40000 ALTER TABLE `assessment_unit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assessment_unit_association`
--

DROP TABLE IF EXISTS `assessment_unit_association`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assessment_unit_association` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `PlannedAssessmentUnit_id` int(10) unsigned NOT NULL COMMENT 'alias AssessmentUnit_id',
  `ActedAssessmentUnit_id` int(10) unsigned NOT NULL COMMENT 'alias AssessmentUnit_id',
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `plan_XAUA_fk_XAU_idx` (`PlannedAssessmentUnit_id`),
  KEY `plan_XAUA_fk_XAU2_idx` (`ActedAssessmentUnit_id`),
  CONSTRAINT `plan_XAUA_fk_XAU1` FOREIGN KEY (`PlannedAssessmentUnit_id`) REFERENCES `assessment_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `plan_XAUA_fk_XAU2` FOREIGN KEY (`ActedAssessmentUnit_id`) REFERENCES `assessment_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assessment_unit_association`
--

LOCK TABLES `assessment_unit_association` WRITE;
/*!40000 ALTER TABLE `assessment_unit_association` DISABLE KEYS */;
/*!40000 ALTER TABLE `assessment_unit_association` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assessment_unit_value`
--

DROP TABLE IF EXISTS `assessment_unit_value`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assessment_unit_value` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `AssessmentUnit_id` int(10) unsigned NOT NULL,
  `Student_id` int(10) unsigned NOT NULL COMMENT 'alias Person_id',
  `grade` varchar(2) NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `assessment_XAUV_uq` (`AssessmentUnit_id`,`Student_id`,`grade`),
  KEY `assessment_XAUV_fk_XAU_idx` (`AssessmentUnit_id`),
  KEY `assessment_XAUV_fk_XAUV000_idx` (`RevisedRow_id`),
  KEY `assessment_XAUV_fk_XP_idx` (`Student_id`),
  CONSTRAINT `assessment_XAUV_fk_XAU` FOREIGN KEY (`AssessmentUnit_id`) REFERENCES `assessment_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `assessment_XAUV_fk_XAUV000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `assessment_unit_value` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `assessment_XAUV_fk_XP` FOREIGN KEY (`Student_id`) REFERENCES `person` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assessment_unit_value`
--

LOCK TABLES `assessment_unit_value` WRITE;
/*!40000 ALTER TABLE `assessment_unit_value` DISABLE KEYS */;
/*!40000 ALTER TABLE `assessment_unit_value` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consumed_material`
--

DROP TABLE IF EXISTS `consumed_material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consumed_material` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `MaterialLocation_id` int(10) unsigned NOT NULL,
  `Quantity` float unsigned NOT NULL,
  `Date` date NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `material_XCM_fk_XML_idx` (`MaterialLocation_id`),
  KEY `material_XCM_fk_XCM000_idx` (`RevisedRow_id`),
  CONSTRAINT `material_XCM_fk_XCM000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `consumed_material` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `material_XCM_fk_XML` FOREIGN KEY (`MaterialLocation_id`) REFERENCES `material_location` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consumed_material`
--

LOCK TABLES `consumed_material` WRITE;
/*!40000 ALTER TABLE `consumed_material` DISABLE KEYS */;
/*!40000 ALTER TABLE `consumed_material` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `Alias` varchar(45) DEFAULT NULL,
  `DependencyRule` text,
  `Owner_id` int(10) unsigned NOT NULL COMMENT 'alias Group_id',
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `course_XC_uq` (`Name`),
  KEY `course_XC_fk_XC000_idx` (`RevisedRow_id`),
  KEY `course_XC_fk_FG_idx` (`Owner_id`),
  CONSTRAINT `course_XC_fk_FG` FOREIGN KEY (`Owner_id`) REFERENCES `group` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `course_XC_fk_XC000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `course` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course`
--

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_availability`
--

DROP TABLE IF EXISTS `course_availability`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course_availability` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Course_id` int(10) unsigned NOT NULL,
  `MacrotimeUnit_id` int(10) unsigned NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `macrotime_XCIMU_uq` (`Course_id`,`MacrotimeUnit_id`),
  KEY `macrotime_XCIMU_fk_XC_idx` (`Course_id`),
  KEY `macrotime_XCIMU_fk_XMU_idx` (`MacrotimeUnit_id`),
  CONSTRAINT `macrotime_XCIMU_fk_XC` FOREIGN KEY (`Course_id`) REFERENCES `course` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `macrotime_XCIMU_fk_XMU` FOREIGN KEY (`MacrotimeUnit_id`) REFERENCES `macrotime_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_availability`
--

LOCK TABLES `course_availability` WRITE;
/*!40000 ALTER TABLE `course_availability` DISABLE KEYS */;
/*!40000 ALTER TABLE `course_availability` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_plan`
--

DROP TABLE IF EXISTS `course_plan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course_plan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CourseUnit_id` int(10) unsigned NOT NULL,
  `NumberOfGrupMember` int(10) unsigned NOT NULL,
  `Parent_id` int(10) unsigned DEFAULT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `plan_XCP_fk_XCU_idx` (`CourseUnit_id`),
  KEY `plan_XCP_fk_XCP000_idx` (`RevisedRow_id`),
  KEY `plan_XCP_fk_XCP_idx` (`Parent_id`),
  CONSTRAINT `plan_XCP_fk_XCP` FOREIGN KEY (`Parent_id`) REFERENCES `course_plan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `plan_XCP_fk_XCP000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `course_plan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `plan_XCP_fk_XCU` FOREIGN KEY (`CourseUnit_id`) REFERENCES `course_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_plan`
--

LOCK TABLES `course_plan` WRITE;
/*!40000 ALTER TABLE `course_plan` DISABLE KEYS */;
/*!40000 ALTER TABLE `course_plan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_set`
--

DROP TABLE IF EXISTS `course_set`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course_set` (
  `id` int(10) unsigned NOT NULL,
  `Name` varchar(45) NOT NULL,
  `DependencyRule` text,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `course_XCS_uq` (`Name`),
  KEY `course_XCS_fk_XCS000_idx` (`RevisedRow_id`),
  CONSTRAINT `course_XCS_fk_XCS000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `course_set` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_set`
--

LOCK TABLES `course_set` WRITE;
/*!40000 ALTER TABLE `course_set` DISABLE KEYS */;
/*!40000 ALTER TABLE `course_set` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_set_component`
--

DROP TABLE IF EXISTS `course_set_component`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course_set_component` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CourseSet_id` int(10) unsigned NOT NULL,
  `Course_id` int(10) unsigned NOT NULL,
  `MandatoryStatus` tinyint(1) NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `curriculum_XCSC_uq` (`CourseSet_id`,`Course_id`,`MandatoryStatus`),
  KEY `curriculum_XCSC_fk_XC_idx` (`Course_id`),
  KEY `curriculum_XCSC_fk_XCSC000_idx` (`RevisedRow_id`),
  CONSTRAINT `curriculum_XCSC_fk_XC` FOREIGN KEY (`Course_id`) REFERENCES `course` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `curriculum_XCSC_fk_XCS` FOREIGN KEY (`CourseSet_id`) REFERENCES `course_set` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `curriculum_XCSC_fk_XCSC000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `course_set_component` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_set_component`
--

LOCK TABLES `course_set_component` WRITE;
/*!40000 ALTER TABLE `course_set_component` DISABLE KEYS */;
/*!40000 ALTER TABLE `course_set_component` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_unit`
--

DROP TABLE IF EXISTS `course_unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course_unit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Course_id` int(10) unsigned NOT NULL,
  `name` varchar(45) NOT NULL,
  `StudentGroup_id` int(10) unsigned NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `course_XCU_uq` (`Course_id`,`StudentGroup_id`),
  KEY `course_XCU_fk_XG_idx` (`StudentGroup_id`),
  KEY `course_XCU_fk_XCTS_idx` (`Course_id`),
  KEY `course_XCU_fk_XCU000_idx` (`RevisedRow_id`),
  CONSTRAINT `course_XCU_fk_XC000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `course_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `course_XCU_fk_XCTS` FOREIGN KEY (`Course_id`) REFERENCES `course` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `course_XCU_fk_XG` FOREIGN KEY (`StudentGroup_id`) REFERENCES `group` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_unit`
--

LOCK TABLES `course_unit` WRITE;
/*!40000 ALTER TABLE `course_unit` DISABLE KEYS */;
/*!40000 ALTER TABLE `course_unit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_unit_association`
--

DROP TABLE IF EXISTS `course_unit_association`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course_unit_association` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `PlannedCourseUnit_id` int(10) unsigned NOT NULL COMMENT 'alias CourseUnit_id',
  `ActedCourseUnit_id` int(10) unsigned NOT NULL COMMENT 'alias CourseUnit_id',
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `plan_XCUA_fk_XCU1_idx` (`PlannedCourseUnit_id`),
  KEY `plan_XCUA_fk_XCU2_idx` (`ActedCourseUnit_id`),
  CONSTRAINT `plan_XCUA_fk_XCU1` FOREIGN KEY (`PlannedCourseUnit_id`) REFERENCES `course_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `plan_XCUA_fk_XCU2` FOREIGN KEY (`ActedCourseUnit_id`) REFERENCES `course_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_unit_association`
--

LOCK TABLES `course_unit_association` WRITE;
/*!40000 ALTER TABLE `course_unit_association` DISABLE KEYS */;
/*!40000 ALTER TABLE `course_unit_association` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_unit_conversion`
--

DROP TABLE IF EXISTS `course_unit_conversion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course_unit_conversion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `OldCourseUnit_id` int(10) unsigned DEFAULT NULL,
  `NewCourseUnit_id` int(10) unsigned NOT NULL,
  `Person_id` int(10) unsigned NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `conversion_XCUC_fk_XCU1_idx` (`OldCourseUnit_id`),
  KEY `conversion_XCUC_fk_XCU2_idx` (`NewCourseUnit_id`),
  KEY `conversion_XCUC_fk_XP_idx` (`Person_id`),
  KEY `conversion_XCUC_fk_XCUC000_idx` (`RevisedRow_id`),
  CONSTRAINT `conversion_XCUC_fk_XCU1` FOREIGN KEY (`OldCourseUnit_id`) REFERENCES `course_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `conversion_XCUC_fk_XCU2` FOREIGN KEY (`NewCourseUnit_id`) REFERENCES `course_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `conversion_XCUC_fk_XCUC000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `course_unit_conversion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `conversion_XCUC_fk_XP` FOREIGN KEY (`Person_id`) REFERENCES `person` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_unit_conversion`
--

LOCK TABLES `course_unit_conversion` WRITE;
/*!40000 ALTER TABLE `course_unit_conversion` DISABLE KEYS */;
/*!40000 ALTER TABLE `course_unit_conversion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_unit_rule`
--

DROP TABLE IF EXISTS `course_unit_rule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course_unit_rule` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CourseUnit_id` int(10) unsigned NOT NULL,
  `Formula` varchar(45) NOT NULL,
  `PlannedStatus` tinyint(1) NOT NULL,
  `UsedStatus` tinyint(1) NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `report_XCUR_uq1` (`CourseUnit_id`,`Formula`,`PlannedStatus`),
  UNIQUE KEY `report_XCUR_uq2` (`CourseUnit_id`,`Formula`,`UsedStatus`),
  KEY `report_XCUR_fk_XCU_idx` (`CourseUnit_id`),
  KEY `report_XCUR_fk_XCUR000_idx` (`RevisedRow_id`),
  CONSTRAINT `report_XCUR_fk_XCU` FOREIGN KEY (`CourseUnit_id`) REFERENCES `course_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `report_XCUR_fk_XCUR000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `course_unit_rule` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_unit_rule`
--

LOCK TABLES `course_unit_rule` WRITE;
/*!40000 ALTER TABLE `course_unit_rule` DISABLE KEYS */;
/*!40000 ALTER TABLE `course_unit_rule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_unit_value`
--

DROP TABLE IF EXISTS `course_unit_value`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course_unit_value` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CourceUnit_id` int(10) unsigned NOT NULL,
  `Student_id` int(10) unsigned NOT NULL,
  `Grade` varchar(2) NOT NULL,
  `AdjustedStatus` tinyint(1) NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `report_XCUV_uq` (`CourceUnit_id`,`Student_id`,`Grade`,`AdjustedStatus`),
  KEY `report_XCUV_fk_XCU_idx` (`CourceUnit_id`),
  KEY `report_XCUV_fk_XP_idx` (`Student_id`),
  KEY `report_XCUV_fk_XCUV000_idx` (`RevisedRow_id`),
  CONSTRAINT `report_XCUV_fk_XCU` FOREIGN KEY (`CourceUnit_id`) REFERENCES `course_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `report_XCUV_fk_XCUV000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `course_unit_value` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `report_XCUV_fk_XP` FOREIGN KEY (`Student_id`) REFERENCES `person` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_unit_value`
--

LOCK TABLES `course_unit_value` WRITE;
/*!40000 ALTER TABLE `course_unit_value` DISABLE KEYS */;
/*!40000 ALTER TABLE `course_unit_value` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curriculum`
--

DROP TABLE IF EXISTS `curriculum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curriculum` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `Parent_id` int(10) unsigned DEFAULT NULL,
  `Owner_id` int(10) unsigned NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `curriculum_XC_uq` (`Name`),
  KEY `curriculum_XC_fk_XC000_idx` (`RevisedRow_id`),
  KEY `curriculum_XC_fk_XC_idx` (`Parent_id`),
  KEY `curricullum_XC_fk_XG_idx` (`Owner_id`),
  CONSTRAINT `curricullum_XC_fk_XG` FOREIGN KEY (`Owner_id`) REFERENCES `group` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `curriculum_XC_fk_XC` FOREIGN KEY (`Parent_id`) REFERENCES `curriculum` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `curriculum_XC_fk_XC000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `curriculum` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curriculum`
--

LOCK TABLES `curriculum` WRITE;
/*!40000 ALTER TABLE `curriculum` DISABLE KEYS */;
/*!40000 ALTER TABLE `curriculum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curriculum_component`
--

DROP TABLE IF EXISTS `curriculum_component`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curriculum_component` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Curriculum_id` int(10) unsigned NOT NULL,
  `CourseSet_id` int(10) unsigned NOT NULL,
  `MandatoryStatus` tinyint(1) NOT NULL,
  `Order` int(10) unsigned DEFAULT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `curriculum_XCC_uq` (`Curriculum_id`,`CourseSet_id`,`MandatoryStatus`),
  KEY `curriculum_XCC_fk_XC_idx` (`Curriculum_id`),
  KEY `curriculum_XCC_fk_XCS_idx` (`CourseSet_id`),
  KEY `curriculum_XCC_fk_XCC000_idx` (`RevisedRow_id`),
  CONSTRAINT `curriculum_XCC_fk_XC` FOREIGN KEY (`Curriculum_id`) REFERENCES `curriculum` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `curriculum_XCC_fk_XCC000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `curriculum_component` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `curriculum_XCC_fk_XCS` FOREIGN KEY (`CourseSet_id`) REFERENCES `course_set` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curriculum_component`
--

LOCK TABLES `curriculum_component` WRITE;
/*!40000 ALTER TABLE `curriculum_component` DISABLE KEYS */;
/*!40000 ALTER TABLE `curriculum_component` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curriculum_participant`
--

DROP TABLE IF EXISTS `curriculum_participant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curriculum_participant` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Curriculum_id` int(10) unsigned NOT NULL,
  `Group_id` int(10) unsigned NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `curriculum_XCP_uq` (`Curriculum_id`,`Group_id`),
  KEY `curriculum_XCP_fk_XC_idx` (`Curriculum_id`),
  KEY `curriculum_XCP_fk_XG_idx` (`Group_id`),
  KEY `curriculum_XCP_fk_XCP000_idx` (`RevisedRow_id`),
  CONSTRAINT `curriculum_XCP_fk_XC` FOREIGN KEY (`Curriculum_id`) REFERENCES `curriculum` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `curriculum_XCP_fk_XCP000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `curriculum_participant` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `curriculum_XCP_fk_XG` FOREIGN KEY (`Group_id`) REFERENCES `group` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curriculum_participant`
--

LOCK TABLES `curriculum_participant` WRITE;
/*!40000 ALTER TABLE `curriculum_participant` DISABLE KEYS */;
/*!40000 ALTER TABLE `curriculum_participant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curriculum_setting`
--

DROP TABLE IF EXISTS `curriculum_setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curriculum_setting` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `RootCurriculum_id` int(10) unsigned NOT NULL COMMENT 'alias Curriculum_id',
  `SequencedStatus` tinyint(1) NOT NULL,
  `ActivatedStatus` tinyint(1) NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `curriculum_XCS_fk_XC_idx` (`RootCurriculum_id`),
  KEY `curriculum_XCS_fk_XCS000_idx` (`RevisedRow_id`),
  CONSTRAINT `curriculum_XCS_fk_XC` FOREIGN KEY (`RootCurriculum_id`) REFERENCES `curriculum` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `curriculum_XCS_fk_XCS000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `curriculum_setting` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curriculum_setting`
--

LOCK TABLES `curriculum_setting` WRITE;
/*!40000 ALTER TABLE `curriculum_setting` DISABLE KEYS */;
/*!40000 ALTER TABLE `curriculum_setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `day_set`
--

DROP TABLE IF EXISTS `day_set`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `day_set` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `microtime_XDS_XDS000_idx` (`RevisedRow_id`),
  CONSTRAINT `microtime_XDS_XDS000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `day_set` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `day_set`
--

LOCK TABLES `day_set` WRITE;
/*!40000 ALTER TABLE `day_set` DISABLE KEYS */;
INSERT INTO `day_set` VALUES (1,'weekly',NULL,1,0),(2,'biweekly',NULL,1,0),(3,'4 repeated day',NULL,1,0),(4,'8 repeated day',NULL,1,0);
/*!40000 ALTER TABLE `day_set` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `day_set_ownership`
--

DROP TABLE IF EXISTS `day_set_ownership`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `day_set_ownership` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `DaySet_id` int(10) unsigned NOT NULL,
  `Group_id` int(10) unsigned NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `microtime_XDSO_uq` (`DaySet_id`,`Group_id`),
  KEY `microtime_XDSO_fk_XDS_idx` (`DaySet_id`),
  KEY `microtime_XDSO_fk_XG_idx` (`Group_id`),
  CONSTRAINT `microtime_XDSO_fk_XDS` FOREIGN KEY (`DaySet_id`) REFERENCES `day_set` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `microtime_XDSO_fk_XG` FOREIGN KEY (`Group_id`) REFERENCES `group` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `day_set_ownership`
--

LOCK TABLES `day_set_ownership` WRITE;
/*!40000 ALTER TABLE `day_set_ownership` DISABLE KEYS */;
/*!40000 ALTER TABLE `day_set_ownership` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `day_unit`
--

DROP TABLE IF EXISTS `day_unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `day_unit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `DaySet_id` int(10) unsigned NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `microtime_XDU_uq` (`Name`,`DaySet_id`),
  KEY `microtime_XDU_fk_XDU000_idx` (`RevisedRow_id`),
  KEY `microtime_XDU_fk_XDS_idx` (`DaySet_id`),
  CONSTRAINT `microtime_XDU_fk_XDS` FOREIGN KEY (`DaySet_id`) REFERENCES `day_set` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `microtime_XDU_fk_XDU000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `day_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `day_unit`
--

LOCK TABLES `day_unit` WRITE;
/*!40000 ALTER TABLE `day_unit` DISABLE KEYS */;
INSERT INTO `day_unit` VALUES (1,'Monday',1,NULL,1,0),(2,'Tuesday',1,NULL,1,0),(3,'Wednesday',1,NULL,1,0),(4,'Thursday',1,NULL,1,0),(5,'Friday',1,NULL,1,0),(6,'Saturday',1,NULL,1,0),(7,'Sunday',1,NULL,1,0),(8,'Monday 1st',2,NULL,1,0),(9,'Tuesday 1st',2,NULL,1,0),(10,'Wednesday 1st',2,NULL,1,0),(11,'Thursday 1st',2,NULL,1,0),(12,'Friday 1st',2,NULL,1,0),(13,'Saturday 1st',2,NULL,1,0),(14,'Sunday 1st',2,NULL,1,0),(15,'Monday 2nd',2,NULL,1,0),(16,'Tuesday 2nd',2,NULL,1,0),(17,'Wednesday 2nd',2,NULL,1,0),(18,'Thursday 2nd',2,NULL,1,0),(19,'Friday 2nd',2,NULL,1,0),(20,'Saturday 2nd',2,NULL,1,0),(21,'Sunday 2nd',2,NULL,1,0),(22,'day-1',3,NULL,1,0),(23,'day-2',3,NULL,1,0),(24,'day-3',3,NULL,1,0),(25,'day-4',3,NULL,1,0),(26,'day-1',4,NULL,1,0),(27,'day-2',4,NULL,1,0),(28,'day-3',4,NULL,1,0),(29,'day-4',4,NULL,1,0),(30,'day-5',4,NULL,1,0),(31,'day-6',4,NULL,1,0),(32,'day-7',4,NULL,1,0),(33,'day-8',4,NULL,1,0);
/*!40000 ALTER TABLE `day_unit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disease`
--

DROP TABLE IF EXISTS `disease`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disease` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `Parent_id` int(10) unsigned NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `medic_XD_uq` (`Name`,`Parent_id`),
  KEY `medic_XD_fk_XD` (`Parent_id`),
  KEY `medic_XD_fk_XD000_idx` (`RevisedRow_id`),
  CONSTRAINT `medic_XD_fk_XD` FOREIGN KEY (`Parent_id`) REFERENCES `disease` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `medic_XD_fk_XD000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `disease` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disease`
--

LOCK TABLES `disease` WRITE;
/*!40000 ALTER TABLE `disease` DISABLE KEYS */;
INSERT INTO `disease` VALUES (1,'influenza',1,NULL,1,0),(2,'cacar',1,NULL,1,0),(3,'maag',2,NULL,1,0);
/*!40000 ALTER TABLE `disease` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `document`
--

DROP TABLE IF EXISTS `document`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `document` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `File` blob,
  `PhysicalExistance` tinyint(1) DEFAULT NULL,
  `Url` text,
  `DocumentBundle_id` int(10) unsigned NOT NULL,
  `SenderType_id` int(10) unsigned NOT NULL,
  `Sender_id` int(10) unsigned DEFAULT NULL,
  `ReceiverType_id` int(10) unsigned NOT NULL,
  `Receiver_id` int(10) unsigned DEFAULT NULL,
  `SentDate` date NOT NULL,
  `ReceivedDate` date DEFAULT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `document_XD_uq` (`Name`,`DocumentBundle_id`),
  KEY `document_XD_fk_XD000_idx` (`RevisedRow_id`),
  KEY `document_XD_fk_XDB_idx` (`DocumentBundle_id`),
  CONSTRAINT `document_XD_fk_XD000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `document` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `document_XD_fk_XDB` FOREIGN KEY (`DocumentBundle_id`) REFERENCES `document_bundle` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `document`
--

LOCK TABLES `document` WRITE;
/*!40000 ALTER TABLE `document` DISABLE KEYS */;
/*!40000 ALTER TABLE `document` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `document_bundle`
--

DROP TABLE IF EXISTS `document_bundle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `document_bundle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `PhysicalLocation` text,
  `Parent_id` int(10) unsigned DEFAULT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `document_XDB_uq` (`Name`),
  KEY `document_XDB_fk_XDB_idx` (`Parent_id`),
  KEY `document_XDB_fk_XDB000_idx` (`RevisedRow_id`),
  CONSTRAINT `document_XDB_fk_XDB0` FOREIGN KEY (`Parent_id`) REFERENCES `document_bundle` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `document_XDB_fk_XDB0000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `document_bundle` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `document_bundle`
--

LOCK TABLES `document_bundle` WRITE;
/*!40000 ALTER TABLE `document_bundle` DISABLE KEYS */;
/*!40000 ALTER TABLE `document_bundle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `EntityType_id` int(10) unsigned NOT NULL,
  `Entity_id` int(10) unsigned NOT NULL,
  `Parent_id` int(10) unsigned DEFAULT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `event_XE_uq` (`Name`,`StartDate`,`EndDate`,`EntityType_id`,`Entity_id`,`Parent_id`),
  KEY `event_XE_fk_XE_idx` (`Parent_id`),
  KEY `event_XE_fk_XE000_idx` (`RevisedRow_id`),
  CONSTRAINT `event_XE_fk_XE` FOREIGN KEY (`Parent_id`) REFERENCES `event` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `event_XE_fk_XE000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `event` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expence_in_lecture_unit`
--

DROP TABLE IF EXISTS `expence_in_lecture_unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expence_in_lecture_unit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Expence_id` int(10) unsigned DEFAULT NULL,
  `Amount` int(10) unsigned NOT NULL,
  `LectureUnit_id` int(10) unsigned NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `expense_XEILU_fk_XE_idx` (`Expence_id`),
  KEY `expense_XEILU_fk_XEILU000_idx` (`RevisedRow_id`),
  CONSTRAINT `expense_XEILU_fk_XE` FOREIGN KEY (`Expence_id`) REFERENCES `expense` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `expense_XEILU_fk_XEILU000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `expence_in_lecture_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expence_in_lecture_unit`
--

LOCK TABLES `expence_in_lecture_unit` WRITE;
/*!40000 ALTER TABLE `expence_in_lecture_unit` DISABLE KEYS */;
/*!40000 ALTER TABLE `expence_in_lecture_unit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expense`
--

DROP TABLE IF EXISTS `expense`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expense` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ExpenseType_id` int(10) unsigned NOT NULL,
  `Group_id` int(10) unsigned NOT NULL,
  `Amount` int(10) unsigned NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `expense_XE_fk_XET_idx` (`ExpenseType_id`),
  KEY `expense_XE_fk_XG_idx` (`Group_id`),
  KEY `expense_XE_fk_XE_idx` (`RevisedRow_id`),
  CONSTRAINT `expense_XE_fk_XE` FOREIGN KEY (`RevisedRow_id`) REFERENCES `expense` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `expense_XE_fk_XET` FOREIGN KEY (`ExpenseType_id`) REFERENCES `expense_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `expense_XE_fk_XG` FOREIGN KEY (`Group_id`) REFERENCES `group` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expense`
--

LOCK TABLES `expense` WRITE;
/*!40000 ALTER TABLE `expense` DISABLE KEYS */;
/*!40000 ALTER TABLE `expense` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expense_type`
--

DROP TABLE IF EXISTS `expense_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expense_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `Code` varchar(45) NOT NULL,
  `Parent_id` int(10) unsigned DEFAULT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `expense_XET_fk_XET_idx` (`Parent_id`),
  KEY `expense_XET_fk_XET000_idx` (`RevisedRow_id`),
  CONSTRAINT `expense_XET_fk_XET` FOREIGN KEY (`Parent_id`) REFERENCES `expense_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `expense_XET_fk_XET000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `expense_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expense_type`
--

LOCK TABLES `expense_type` WRITE;
/*!40000 ALTER TABLE `expense_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `expense_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `external_institution`
--

DROP TABLE IF EXISTS `external_institution`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `external_institution` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `Parent_id` int(10) unsigned DEFAULT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `global_XEI_uq` (`Name`,`Parent_id`),
  KEY `global_XEI_fk_XEI_idx` (`Parent_id`),
  KEY `global_XEI_fk_XEI000_idx` (`RevisedRow_id`),
  CONSTRAINT `global_XEI_fk_XEI` FOREIGN KEY (`Parent_id`) REFERENCES `external_institution` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `global_XEI_fk_XEI000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `external_institution` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `external_institution`
--

LOCK TABLES `external_institution` WRITE;
/*!40000 ALTER TABLE `external_institution` DISABLE KEYS */;
/*!40000 ALTER TABLE `external_institution` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `generation`
--

DROP TABLE IF EXISTS `generation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `generation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Group_id` int(10) unsigned NOT NULL,
  `Name` varchar(45) NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `recruitment_XG_uq` (`Group_id`,`Name`),
  KEY `recruitment_XG_fk_XO_idx` (`Group_id`),
  KEY `recruitment_XG_fk_XG000_idx` (`RevisedRow_id`),
  CONSTRAINT `recruitment_XG_fk_XG000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `generation` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `recruitment_XG_fk_XO` FOREIGN KEY (`Group_id`) REFERENCES `group` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `generation`
--

LOCK TABLES `generation` WRITE;
/*!40000 ALTER TABLE `generation` DISABLE KEYS */;
/*!40000 ALTER TABLE `generation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grade_factor`
--

DROP TABLE IF EXISTS `grade_factor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grade_factor` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `AssessmentUnit_id` int(10) unsigned NOT NULL,
  `Student_id` int(10) unsigned NOT NULL,
  `ActivityType_id` int(10) unsigned NOT NULL COMMENT 'alias Lookup_id',
  `Activity_id` int(10) unsigned DEFAULT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `assessment_XGF_fk_XAU_idx` (`AssessmentUnit_id`),
  KEY `assessment_XGF_fk_XP_idx` (`Student_id`),
  KEY `assessment_XGF_fk_XGF000_idx` (`RevisedRow_id`),
  KEY `assessment_XGF_fk_XL_idx` (`ActivityType_id`),
  CONSTRAINT `assessment_XGF_fk_XAU` FOREIGN KEY (`AssessmentUnit_id`) REFERENCES `assessment_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `assessment_XGF_fk_XGF000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `grade_factor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `assessment_XGF_fk_XL` FOREIGN KEY (`ActivityType_id`) REFERENCES `lookup` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `assessment_XGF_fk_XP` FOREIGN KEY (`Student_id`) REFERENCES `person` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grade_factor`
--

LOCK TABLES `grade_factor` WRITE;
/*!40000 ALTER TABLE `grade_factor` DISABLE KEYS */;
/*!40000 ALTER TABLE `grade_factor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group`
--

DROP TABLE IF EXISTS `group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Parent_id` int(10) unsigned DEFAULT NULL,
  `Name` varchar(45) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date DEFAULT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `group_XG_uq` (`Name`,`Parent_id`),
  KEY `group_XG_fk_XG000_idx` (`RevisedRow_id`),
  KEY `group_XG_fk_XG_idx` (`Parent_id`),
  CONSTRAINT `group_XG_fk_XG` FOREIGN KEY (`Parent_id`) REFERENCES `group` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `group_XG_fk_XG000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `group` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group`
--

LOCK TABLES `group` WRITE;
/*!40000 ALTER TABLE `group` DISABLE KEYS */;
INSERT INTO `group` VALUES (1,NULL,'global','2013-01-07',NULL,NULL,1,0);
/*!40000 ALTER TABLE `group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group_history`
--

DROP TABLE IF EXISTS `group_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group_history` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Parent_id` int(10) unsigned DEFAULT NULL,
  `Name` varchar(45) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group_history`
--

LOCK TABLES `group_history` WRITE;
/*!40000 ALTER TABLE `group_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `group_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group_member`
--

DROP TABLE IF EXISTS `group_member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group_member` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Person_id` int(10) unsigned NOT NULL,
  `Group_id` int(10) unsigned NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `person_XGM_uq` (`Person_id`,`Group_id`),
  KEY `person_XGM_fk_XP_idx` (`Person_id`),
  KEY `person_XGM_fk_XG_idx` (`Group_id`),
  KEY `person_XGM_fk_XGM000_idx` (`RevisedRow_id`),
  CONSTRAINT `person_XGM_fk_XG` FOREIGN KEY (`Group_id`) REFERENCES `group` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `person_XGM_fk_XGM000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `group_member` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `person_XGM_fk_XP` FOREIGN KEY (`Person_id`) REFERENCES `person` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group_member`
--

LOCK TABLES `group_member` WRITE;
/*!40000 ALTER TABLE `group_member` DISABLE KEYS */;
/*!40000 ALTER TABLE `group_member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group_structure`
--

DROP TABLE IF EXISTS `group_structure`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group_structure` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Group_id` int(10) unsigned NOT NULL COMMENT 'for root only',
  `Name` varchar(45) NOT NULL,
  `Parent_id` int(10) unsigned DEFAULT NULL,
  `FormalStartDate` date NOT NULL,
  `FormalEndDate` date DEFAULT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `group_XGS_uq` (`Group_id`,`Name`,`Parent_id`),
  KEY `group_XGS_fk_XG_idx` (`Group_id`),
  KEY `group_XGS_fk_XGS_idx` (`Parent_id`),
  KEY `group_XGS_fk_XGS000_idx` (`RevisedRow_id`),
  CONSTRAINT `group_XGS_fk_XG` FOREIGN KEY (`Group_id`) REFERENCES `group` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `group_XGS_fk_XGS` FOREIGN KEY (`Parent_id`) REFERENCES `group_structure` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `group_XGS_fk_XGS000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `group_structure` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group_structure`
--

LOCK TABLES `group_structure` WRITE;
/*!40000 ALTER TABLE `group_structure` DISABLE KEYS */;
/*!40000 ALTER TABLE `group_structure` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group_structure_history`
--

DROP TABLE IF EXISTS `group_structure_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group_structure_history` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Group_id` int(10) unsigned NOT NULL COMMENT 'for root only',
  `Name` varchar(45) NOT NULL,
  `Parent_id` int(10) unsigned DEFAULT NULL,
  `ActualStartDate` date NOT NULL COMMENT 'for root only. actual start date is opposite of formal start date.',
  `ActualEndDate` date DEFAULT NULL COMMENT 'for root only. actual end date is opposite of formal end date.',
  PRIMARY KEY (`id`),
  KEY `group_XGSH_fk_XG_idx` (`Group_id`),
  KEY `group_XGSH_FK_XGSH000_idx` (`Parent_id`),
  CONSTRAINT `group_XGSH_fk_XG` FOREIGN KEY (`Group_id`) REFERENCES `group` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `group_XGSH_FK_XGSH000` FOREIGN KEY (`Parent_id`) REFERENCES `group_structure_history` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='this table entry is generated by application, and user can n';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group_structure_history`
--

LOCK TABLES `group_structure_history` WRITE;
/*!40000 ALTER TABLE `group_structure_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `group_structure_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `income`
--

DROP TABLE IF EXISTS `income`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `income` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `IncomeType_id` int(10) unsigned NOT NULL,
  `Group_id` int(10) unsigned NOT NULL,
  `Amount` int(10) unsigned NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `income_XI_fk_XIT_idx` (`IncomeType_id`),
  KEY `income_XI_fk_XG_idx` (`Group_id`),
  KEY `income_XI_fk_XI000_idx` (`RevisedRow_id`),
  CONSTRAINT `income_XI_fk_XG` FOREIGN KEY (`Group_id`) REFERENCES `group` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `income_XI_fk_XI000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `income` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `income_XI_fk_XIT` FOREIGN KEY (`IncomeType_id`) REFERENCES `income_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `income`
--

LOCK TABLES `income` WRITE;
/*!40000 ALTER TABLE `income` DISABLE KEYS */;
/*!40000 ALTER TABLE `income` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `income_in_lecture_unit`
--

DROP TABLE IF EXISTS `income_in_lecture_unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `income_in_lecture_unit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Income_id` int(10) unsigned DEFAULT NULL,
  `Amount` int(10) unsigned NOT NULL,
  `LectureUnit_id` int(10) unsigned NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `income_XIILU_idx` (`Income_id`),
  KEY `income_XIILU_fk_XIILU000_idx` (`RevisedRow_id`),
  CONSTRAINT `income_XIILU_fk_XI` FOREIGN KEY (`Income_id`) REFERENCES `income` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `income_XIILU_fk_XIILU000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `income_in_lecture_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `income_in_lecture_unit`
--

LOCK TABLES `income_in_lecture_unit` WRITE;
/*!40000 ALTER TABLE `income_in_lecture_unit` DISABLE KEYS */;
/*!40000 ALTER TABLE `income_in_lecture_unit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `income_type`
--

DROP TABLE IF EXISTS `income_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `income_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `Code` varchar(45) NOT NULL,
  `Parent_id` int(10) unsigned DEFAULT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `income_XIT_fk_XIT_idx` (`Parent_id`),
  KEY `income_XIT_fk_XIT000_idx` (`RevisedRow_id`),
  CONSTRAINT `income_XIT_fk_XIT` FOREIGN KEY (`Parent_id`) REFERENCES `income_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `income_XIT_fk_XIT000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `income_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `income_type`
--

LOCK TABLES `income_type` WRITE;
/*!40000 ALTER TABLE `income_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `income_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventory` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `InventoryType_id` int(10) unsigned NOT NULL,
  `Code` varchar(45) NOT NULL,
  `AvailabilityStatus` tinyint(1) NOT NULL,
  `Location_id` int(10) unsigned DEFAULT NULL COMMENT 'alias Space_id',
  `Owner_id` int(10) unsigned NOT NULL COMMENT 'alias Group_id',
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `inventory_XI_uq` (`Code`),
  KEY `inventory_XI_fk_XIT_idx` (`InventoryType_id`),
  KEY `inventory_XI_fk_XI_idx` (`RevisedRow_id`),
  KEY `inventory_XI_fk_XS_idx` (`Location_id`),
  KEY `inventory_XI_fk_XG_idx` (`Owner_id`),
  CONSTRAINT `inventory_XI_fk_XG` FOREIGN KEY (`Owner_id`) REFERENCES `group` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `inventory_XI_fk_XI000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `inventory` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `inventory_XI_fk_XIT` FOREIGN KEY (`InventoryType_id`) REFERENCES `inventory_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `inventory_XI_fk_XS` FOREIGN KEY (`Location_id`) REFERENCES `space` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory`
--

LOCK TABLES `inventory` WRITE;
/*!40000 ALTER TABLE `inventory` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventory_availability_history`
--

DROP TABLE IF EXISTS `inventory_availability_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventory_availability_history` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Inventory_id` int(10) unsigned NOT NULL,
  `OldStatus` varchar(45) NOT NULL,
  `NewStatus` varchar(45) NOT NULL,
  `Date` date NOT NULL,
  `Reason` varchar(45) NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `inventory_XIAH_fk_XI_idx` (`Inventory_id`),
  KEY `inventory_XIAH_fk_XIAH000_idx` (`RevisedRow_id`),
  CONSTRAINT `inventory_XIAH_fk_XI` FOREIGN KEY (`Inventory_id`) REFERENCES `inventory` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `inventory_XIAH_fk_XIAH000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `inventory_availability_history` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory_availability_history`
--

LOCK TABLES `inventory_availability_history` WRITE;
/*!40000 ALTER TABLE `inventory_availability_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventory_availability_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventory_label_template`
--

DROP TABLE IF EXISTS `inventory_label_template`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventory_label_template` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Owner_id` int(10) unsigned NOT NULL,
  `Template` text NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `inventory_XILT_fk_XG_idx` (`Owner_id`),
  CONSTRAINT `inventory_XILT_fk_XG` FOREIGN KEY (`Owner_id`) REFERENCES `group` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory_label_template`
--

LOCK TABLES `inventory_label_template` WRITE;
/*!40000 ALTER TABLE `inventory_label_template` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventory_label_template` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventory_location_history`
--

DROP TABLE IF EXISTS `inventory_location_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventory_location_history` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Inventory_id` int(10) unsigned NOT NULL,
  `OldLocation_id` int(10) unsigned NOT NULL COMMENT 'alias Space_id',
  `NewLocation_id` int(10) unsigned NOT NULL COMMENT 'alias Space_id',
  `Date` date NOT NULL,
  `Reason` varchar(45) NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `inventory_XISH_fk_XI_idx` (`Inventory_id`),
  KEY `inventory_XISH_fk_XS1_idx` (`OldLocation_id`),
  KEY `inventory_XISH_fk_XS2_idx` (`NewLocation_id`),
  KEY `inventory_XISH_fk_XISH000_idx` (`RevisedRow_id`),
  CONSTRAINT `inventory_XISH_fk_XI` FOREIGN KEY (`Inventory_id`) REFERENCES `inventory` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `inventory_XISH_fk_XISH000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `inventory_location_history` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `inventory_XISH_fk_XS1` FOREIGN KEY (`OldLocation_id`) REFERENCES `space` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `inventory_XISH_fk_XS2` FOREIGN KEY (`NewLocation_id`) REFERENCES `space` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory_location_history`
--

LOCK TABLES `inventory_location_history` WRITE;
/*!40000 ALTER TABLE `inventory_location_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventory_location_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventory_ownership_history`
--

DROP TABLE IF EXISTS `inventory_ownership_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventory_ownership_history` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Inventory_id` int(10) unsigned NOT NULL,
  `OldOwner_id` int(10) unsigned NOT NULL COMMENT 'alias Group_id',
  `NewOwner_id` int(10) unsigned NOT NULL COMMENT 'alias Group_id',
  `Date` date NOT NULL,
  `Reason` varchar(45) NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `inventory_XIOH_fk_XI_idx` (`Inventory_id`),
  KEY `inventory_XIOH_fk_XG_idx` (`OldOwner_id`),
  KEY `inventory_XIOH_fk_XG2_idx` (`NewOwner_id`),
  KEY `inventory_XIOH_fk_XIOH000_idx` (`RevisedRow_id`),
  CONSTRAINT `inventory_XIOH_fk_XG1` FOREIGN KEY (`OldOwner_id`) REFERENCES `group` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `inventory_XIOH_fk_XG2` FOREIGN KEY (`NewOwner_id`) REFERENCES `group` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `inventory_XIOH_fk_XI` FOREIGN KEY (`Inventory_id`) REFERENCES `inventory` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `inventory_XIOH_fk_XIOH000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `inventory_ownership_history` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory_ownership_history`
--

LOCK TABLES `inventory_ownership_history` WRITE;
/*!40000 ALTER TABLE `inventory_ownership_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventory_ownership_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventory_type`
--

DROP TABLE IF EXISTS `inventory_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventory_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `Code` varchar(45) NOT NULL,
  `Parent_id` int(10) unsigned DEFAULT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `inventory_XIT_uq` (`Code`),
  KEY `inventory_XIT_fk_XIT_idx` (`Parent_id`),
  KEY `inventory_XIT_fk_XIT000_idx` (`RevisedRow_id`),
  CONSTRAINT `inventory_XIT_fk_XIT` FOREIGN KEY (`Parent_id`) REFERENCES `inventory_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `inventory_XIT_fk_XIT000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `inventory_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory_type`
--

LOCK TABLES `inventory_type` WRITE;
/*!40000 ALTER TABLE `inventory_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventory_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventory_vs_time`
--

DROP TABLE IF EXISTS `inventory_vs_time`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventory_vs_time` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `UsedInventory_id` int(10) unsigned NOT NULL,
  `LectureUnitOccurrence_id` int(10) unsigned NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `occurrence_XIVT_fk_UIILU_idx` (`UsedInventory_id`),
  KEY `occurrence_XIVT_fk_XLUO_idx` (`LectureUnitOccurrence_id`),
  CONSTRAINT `occurrence_XIVT_fk_UIILU` FOREIGN KEY (`UsedInventory_id`) REFERENCES `used_inventory_in_lecture_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `occurrence_XIVT_fk_XLUO` FOREIGN KEY (`LectureUnitOccurrence_id`) REFERENCES `lecture_unit_occurrence` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory_vs_time`
--

LOCK TABLES `inventory_vs_time` WRITE;
/*!40000 ALTER TABLE `inventory_vs_time` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventory_vs_time` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `labelling_history`
--

DROP TABLE IF EXISTS `labelling_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `labelling_history` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NotLabelledInventory_id` int(10) unsigned NOT NULL,
  `Inventory_id` int(10) unsigned NOT NULL,
  `Date` date NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `inventory_XLH_fk_XNLI_idx` (`NotLabelledInventory_id`),
  KEY `inventory_XLH_fk_XI_idx` (`Inventory_id`),
  KEY `inventory_XLH_fk_XLH_idx` (`RevisedRow_id`),
  CONSTRAINT `inventory_XLH_fk_XI` FOREIGN KEY (`Inventory_id`) REFERENCES `inventory` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `inventory_XLH_fk_XLH` FOREIGN KEY (`RevisedRow_id`) REFERENCES `labelling_history` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `inventory_XLH_fk_XNLI` FOREIGN KEY (`NotLabelledInventory_id`) REFERENCES `not_labelled_inventory` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `labelling_history`
--

LOCK TABLES `labelling_history` WRITE;
/*!40000 ALTER TABLE `labelling_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `labelling_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lecture_set`
--

DROP TABLE IF EXISTS `lecture_set`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lecture_set` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CourseUnit_id` int(10) unsigned NOT NULL,
  `Name` varchar(45) NOT NULL,
  `LecturerGroup_id` int(10) unsigned NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `lecture_XLS_uq` (`CourseUnit_id`,`Name`),
  KEY `lecture_XLS_fk_XCU_idx` (`CourseUnit_id`),
  KEY `lecture_XLS_fk_XLS000_idx` (`RevisedRow_id`),
  KEY `lecture_XLS_fk_XG_idx` (`LecturerGroup_id`),
  CONSTRAINT `lecture_XLS_fk_XCU` FOREIGN KEY (`CourseUnit_id`) REFERENCES `course_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `lecture_XLS_fk_XG` FOREIGN KEY (`LecturerGroup_id`) REFERENCES `group` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `lecture_XLS_fk_XLS000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `lecture_set` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lecture_set`
--

LOCK TABLES `lecture_set` WRITE;
/*!40000 ALTER TABLE `lecture_set` DISABLE KEYS */;
/*!40000 ALTER TABLE `lecture_set` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lecture_set_association`
--

DROP TABLE IF EXISTS `lecture_set_association`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lecture_set_association` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `PlannedLectureSet_id` int(10) unsigned NOT NULL COMMENT 'alias LectureSet_id',
  `ActedLectureSet_id` int(10) unsigned NOT NULL COMMENT 'alias LectureSet_id',
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `plan_XLSA_fk_XLS1_idx` (`PlannedLectureSet_id`),
  KEY `plan_XLSA_fk_XLS2_idx` (`ActedLectureSet_id`),
  CONSTRAINT `plan_XLSA_fk_XLS1` FOREIGN KEY (`PlannedLectureSet_id`) REFERENCES `lecture_set` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `plan_XLSA_fk_XLS2` FOREIGN KEY (`ActedLectureSet_id`) REFERENCES `lecture_set` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lecture_set_association`
--

LOCK TABLES `lecture_set_association` WRITE;
/*!40000 ALTER TABLE `lecture_set_association` DISABLE KEYS */;
/*!40000 ALTER TABLE `lecture_set_association` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lecture_set_conversion`
--

DROP TABLE IF EXISTS `lecture_set_conversion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lecture_set_conversion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `OldLectureSet_id` int(10) unsigned DEFAULT NULL,
  `NewLectureSet_id` int(10) unsigned NOT NULL,
  `Person_id` int(10) unsigned NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `conversion_XLSC_fk_XLS_idx` (`OldLectureSet_id`),
  KEY `conversion_XLSC_fk_XLS2_idx` (`NewLectureSet_id`),
  KEY `conversion_XLSC_fk_XP_idx` (`Person_id`),
  KEY `conversion_XLSC_fk_XLSC000_idx` (`RevisedRow_id`),
  CONSTRAINT `conversion_XLSC_fk_XLS1` FOREIGN KEY (`OldLectureSet_id`) REFERENCES `lecture_set` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `conversion_XLSC_fk_XLS2` FOREIGN KEY (`NewLectureSet_id`) REFERENCES `lecture_set` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `conversion_XLSC_fk_XLSC000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `lecture_set_conversion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `conversion_XLSC_fk_XP` FOREIGN KEY (`Person_id`) REFERENCES `person` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lecture_set_conversion`
--

LOCK TABLES `lecture_set_conversion` WRITE;
/*!40000 ALTER TABLE `lecture_set_conversion` DISABLE KEYS */;
/*!40000 ALTER TABLE `lecture_set_conversion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lecture_unit`
--

DROP TABLE IF EXISTS `lecture_unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lecture_unit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `LectureSet_id` int(10) unsigned NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `lecture_XLU_uq` (`LectureSet_id`),
  KEY `lecture_XLU_fk_XLS_idx` (`LectureSet_id`),
  KEY `lecture_XLU_fk_XLU000_idx` (`RevisedRow_id`),
  CONSTRAINT `lecture_XLU_fk_XL000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `lecture_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `lecture_XLU_fk_XLU` FOREIGN KEY (`LectureSet_id`) REFERENCES `lecture_set` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lecture_unit`
--

LOCK TABLES `lecture_unit` WRITE;
/*!40000 ALTER TABLE `lecture_unit` DISABLE KEYS */;
/*!40000 ALTER TABLE `lecture_unit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lecture_unit_association`
--

DROP TABLE IF EXISTS `lecture_unit_association`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lecture_unit_association` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `PlannedCourseUnit_id` int(10) unsigned NOT NULL COMMENT 'alias CourseUnit_id',
  `ActedCourseUnit_id` int(10) unsigned NOT NULL COMMENT 'alias CourseUnit_id',
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `plan_XLUA_fk_XLU1_idx` (`PlannedCourseUnit_id`),
  KEY `plan_XLUA_fk_XLU2_idx` (`ActedCourseUnit_id`),
  CONSTRAINT `plan_XLUA_fk_XLU1` FOREIGN KEY (`PlannedCourseUnit_id`) REFERENCES `lecture_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `plan_XLUA_fk_XLU2` FOREIGN KEY (`ActedCourseUnit_id`) REFERENCES `lecture_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lecture_unit_association`
--

LOCK TABLES `lecture_unit_association` WRITE;
/*!40000 ALTER TABLE `lecture_unit_association` DISABLE KEYS */;
/*!40000 ALTER TABLE `lecture_unit_association` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lecture_unit_occurrence`
--

DROP TABLE IF EXISTS `lecture_unit_occurrence`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lecture_unit_occurrence` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `StartDate` date NOT NULL,
  `StartHour` time NOT NULL,
  `EndDate` date DEFAULT NULL,
  `EndHour` time DEFAULT NULL,
  `TimeUnit_id` int(10) unsigned DEFAULT NULL,
  `LectureUnit_id` int(10) unsigned NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `occurrence_XLUO_fk_XTU_idx` (`TimeUnit_id`),
  KEY `occurrence_XLUO_fk_XLUO000_idx` (`RevisedRow_id`),
  KEY `occurrence_XLUO_fk_XLU_idx` (`LectureUnit_id`),
  CONSTRAINT `occurrence_XLUO_fk_XLU` FOREIGN KEY (`LectureUnit_id`) REFERENCES `lecture_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `occurrence_XLUO_fk_XLUO000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `lecture_unit_occurrence` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `occurrence_XLUO_fk_XTU` FOREIGN KEY (`TimeUnit_id`) REFERENCES `microtime_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lecture_unit_occurrence`
--

LOCK TABLES `lecture_unit_occurrence` WRITE;
/*!40000 ALTER TABLE `lecture_unit_occurrence` DISABLE KEYS */;
/*!40000 ALTER TABLE `lecture_unit_occurrence` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `TableName` varchar(256) NOT NULL,
  `Field_id` int(11) NOT NULL,
  `Operation_id` int(10) unsigned NOT NULL,
  `User_id` int(11) NOT NULL,
  `TimeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `global_XL_fk_XL_idx` (`Operation_id`),
  CONSTRAINT `global_XL_fk_XL` FOREIGN KEY (`Operation_id`) REFERENCES `lookup` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
/*!40000 ALTER TABLE `log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lookup`
--

DROP TABLE IF EXISTS `lookup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lookup` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `TableName` varchar(128) NOT NULL,
  `FieldName` varchar(128) NOT NULL,
  `Value` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `global_XL_uq` (`TableName`,`FieldName`,`Value`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lookup`
--

LOCK TABLES `lookup` WRITE;
/*!40000 ALTER TABLE `lookup` DISABLE KEYS */;
INSERT INTO `lookup` VALUES (12,'absence_factor','ActivityType','external event'),(11,'absence_factor','ActivityType','internal event'),(10,'absence_factor','ActivityType','medic'),(16,'additional_property','EntityType','disease'),(21,'additional_property','EntityType','external institution'),(17,'additional_property','EntityType','group'),(19,'additional_property','EntityType','group member'),(18,'additional_property','EntityType','group structure'),(15,'additional_property','EntityType','medical record'),(13,'additional_property','EntityType','person'),(14,'additional_property','EntityType','person relationship'),(20,'additional_property','EntityType','structure member'),(9,'grade_factor','ActivityType','external event'),(8,'grade_factor','ActivityType','internal event'),(7,'grade_factor','ActivityType','medic'),(6,'log','Operation','delete'),(4,'log','Operation','insert'),(5,'log','Operation','update'),(1,'person_relationship','RelationshipType','Father'),(2,'person_relationship','RelationshipType','Mother'),(3,'person_relationship','RelationshipType','Son');
/*!40000 ALTER TABLE `lookup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `macrotime_set`
--

DROP TABLE IF EXISTS `macrotime_set`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `macrotime_set` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `Owner_id` int(10) unsigned NOT NULL COMMENT 'alias Group_id',
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `macrotime_XMS_uq` (`Name`,`Owner_id`),
  KEY `macrotime_XMS_fk_XG_idx` (`Owner_id`),
  KEY `macrotime_XMS_fk_XMS_idx` (`RevisedRow_id`),
  CONSTRAINT `macrotime_XMS_fk_XG` FOREIGN KEY (`Owner_id`) REFERENCES `group` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `macrotime_XMS_fk_XMS` FOREIGN KEY (`RevisedRow_id`) REFERENCES `macrotime_set` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `macrotime_set`
--

LOCK TABLES `macrotime_set` WRITE;
/*!40000 ALTER TABLE `macrotime_set` DISABLE KEYS */;
/*!40000 ALTER TABLE `macrotime_set` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `macrotime_unit`
--

DROP TABLE IF EXISTS `macrotime_unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `macrotime_unit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `MacrotimeSet` int(10) unsigned NOT NULL,
  `NormalStartDate` date NOT NULL,
  `NormalEndDate` date NOT NULL,
  `LimitEndDate` date NOT NULL,
  `RegisterStartDate` date NOT NULL,
  `RegisterEndDate` date NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `macrotime_XMU_uq` (`Name`,`MacrotimeSet`),
  KEY `macrotime_XMU_fk_XMS_idx` (`MacrotimeSet`),
  KEY `macrotime_XMU_fk_XMU000_idx` (`RevisedRow_id`),
  CONSTRAINT `macrotime_XMU_fk_XMS` FOREIGN KEY (`MacrotimeSet`) REFERENCES `macrotime_set` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `macrotime_XMU_fk_XMU000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `macrotime_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `macrotime_unit`
--

LOCK TABLES `macrotime_unit` WRITE;
/*!40000 ALTER TABLE `macrotime_unit` DISABLE KEYS */;
/*!40000 ALTER TABLE `macrotime_unit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `material`
--

DROP TABLE IF EXISTS `material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `material` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `MaterialType_id` int(10) unsigned NOT NULL,
  `Code` varchar(45) NOT NULL,
  `Owner_id` int(10) unsigned NOT NULL,
  `Unit_id` int(10) unsigned NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `material_XM_fk_XMT_idx` (`MaterialType_id`),
  KEY `material_XM_fk_XM000_idx` (`RevisedRow_id`),
  CONSTRAINT `material_XM_fk_XM000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `material` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `material_XM_fk_XMT` FOREIGN KEY (`MaterialType_id`) REFERENCES `material_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material`
--

LOCK TABLES `material` WRITE;
/*!40000 ALTER TABLE `material` DISABLE KEYS */;
/*!40000 ALTER TABLE `material` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `material_change_in_lecture_unit`
--

DROP TABLE IF EXISTS `material_change_in_lecture_unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `material_change_in_lecture_unit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Material_id` int(10) unsigned NOT NULL,
  `Quantity` float NOT NULL,
  `LectureUnit_id` int(10) unsigned NOT NULL,
  `ProducedStatus` tinyint(1) NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `material_XMCILU_fk_XMCILU000_idx` (`RevisedRow_id`),
  KEY `material_XMCILU_fk_XML_idx` (`Material_id`),
  KEY `material_XMCILU_fk_XLU_idx` (`LectureUnit_id`),
  CONSTRAINT `material_XMCILU_fk_XLU` FOREIGN KEY (`LectureUnit_id`) REFERENCES `lecture_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `material_XMCILU_fk_XMCILU000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `material_change_in_lecture_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `material_XMCILU_fk_XML` FOREIGN KEY (`Material_id`) REFERENCES `material` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material_change_in_lecture_unit`
--

LOCK TABLES `material_change_in_lecture_unit` WRITE;
/*!40000 ALTER TABLE `material_change_in_lecture_unit` DISABLE KEYS */;
/*!40000 ALTER TABLE `material_change_in_lecture_unit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `material_history`
--

DROP TABLE IF EXISTS `material_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `material_history` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `OldOwner_id` int(10) unsigned NOT NULL,
  `OldMaterialLocation_id` int(10) unsigned NOT NULL COMMENT 'alias MaterialLocation_id',
  `NewOwner_id` int(10) unsigned NOT NULL,
  `NewMaterialLocation_id` int(10) unsigned NOT NULL COMMENT 'alias MaterialLocation_id',
  `Quantity` float unsigned NOT NULL,
  `Date` date NOT NULL,
  `Reason` varchar(45) NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `material_XMH_fk_XML1_idx` (`OldMaterialLocation_id`),
  KEY `material_XMH_fk_XML2_idx` (`NewMaterialLocation_id`),
  KEY `material_XMH_fk_XMLH000_idx` (`RevisedRow_id`),
  KEY `material_XMH_fk_XG1_idx` (`OldOwner_id`),
  KEY `material_XMH_fk_XG2_idx` (`NewOwner_id`),
  CONSTRAINT `material_XMH_fk_XG1` FOREIGN KEY (`OldOwner_id`) REFERENCES `group` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `material_XMH_fk_XG2` FOREIGN KEY (`NewOwner_id`) REFERENCES `group` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `material_XMH_fk_XMH000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `material_history` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `material_XMH_fk_XML1` FOREIGN KEY (`OldMaterialLocation_id`) REFERENCES `material_location` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `material_XMH_fk_XML2` FOREIGN KEY (`NewMaterialLocation_id`) REFERENCES `material_location` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material_history`
--

LOCK TABLES `material_history` WRITE;
/*!40000 ALTER TABLE `material_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `material_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `material_location`
--

DROP TABLE IF EXISTS `material_location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `material_location` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Material_id` int(10) unsigned NOT NULL,
  `Location_id` int(10) unsigned NOT NULL,
  `Quantity` float unsigned NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `material_XML_fk_XM_idx` (`Material_id`),
  KEY `material_XML_fk_XS_idx` (`Location_id`),
  KEY `material_XML_fk_XML000_idx` (`RevisedRow_id`),
  CONSTRAINT `material_XML_fk_XM` FOREIGN KEY (`Material_id`) REFERENCES `material` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `material_XML_fk_XML000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `material_location` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `material_XML_fk_XS` FOREIGN KEY (`Location_id`) REFERENCES `space` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material_location`
--

LOCK TABLES `material_location` WRITE;
/*!40000 ALTER TABLE `material_location` DISABLE KEYS */;
/*!40000 ALTER TABLE `material_location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `material_type`
--

DROP TABLE IF EXISTS `material_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `material_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `Code` varchar(45) NOT NULL,
  `Parent_id` int(10) unsigned DEFAULT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` int(11) NOT NULL,
  `DeletedStatus` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `material_XMT_fk_XMT_idx` (`Parent_id`),
  KEY `material_XMT_fk_XMT000_idx` (`RevisedRow_id`),
  CONSTRAINT `material_XMT_fk_XMT` FOREIGN KEY (`Parent_id`) REFERENCES `material_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `material_XMT_fk_XMT000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `material_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material_type`
--

LOCK TABLES `material_type` WRITE;
/*!40000 ALTER TABLE `material_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `material_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `material_vs_time`
--

DROP TABLE IF EXISTS `material_vs_time`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `material_vs_time` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `UsedMaterial_id` int(10) unsigned NOT NULL,
  `LectureUnitOccurrence_id` int(10) unsigned NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `occurrence_XMVT_fk_XUMILU_idx` (`UsedMaterial_id`),
  KEY `occurrence_XMVT_fk_XLUO_idx` (`LectureUnitOccurrence_id`),
  CONSTRAINT `occurrence_XMVT_fk_XLUO` FOREIGN KEY (`LectureUnitOccurrence_id`) REFERENCES `lecture_unit_occurrence` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `occurrence_XMVT_fk_XUMILU` FOREIGN KEY (`UsedMaterial_id`) REFERENCES `used_material_in_lecture_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material_vs_time`
--

LOCK TABLES `material_vs_time` WRITE;
/*!40000 ALTER TABLE `material_vs_time` DISABLE KEYS */;
/*!40000 ALTER TABLE `material_vs_time` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medical_record`
--

DROP TABLE IF EXISTS `medical_record`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medical_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Person_id` int(10) unsigned NOT NULL,
  `Disease_id` int(10) unsigned NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date DEFAULT NULL,
  `MedicalInstitutionReference_id` int(10) unsigned DEFAULT NULL COMMENT 'alias ExternalInstitution_id',
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `medic_XMR_uq` (`Person_id`,`Disease_id`,`StartDate`),
  KEY `medic_XMR_fk_XP_idx` (`Person_id`),
  KEY `medic_XMR_fk_XD_idx` (`Disease_id`),
  KEY `medic_XMR_fk_XG_idx` (`MedicalInstitutionReference_id`),
  KEY `medic_XMR_fk_XMR000_idx` (`RevisedRow_id`),
  CONSTRAINT `medic_XMR_fk_XD` FOREIGN KEY (`Disease_id`) REFERENCES `disease` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `medic_XMR_fk_XG` FOREIGN KEY (`MedicalInstitutionReference_id`) REFERENCES `external_institution` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `medic_XMR_fk_XMR000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `medical_record` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `medic_XMR_fk_XP` FOREIGN KEY (`Person_id`) REFERENCES `person` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medical_record`
--

LOCK TABLES `medical_record` WRITE;
/*!40000 ALTER TABLE `medical_record` DISABLE KEYS */;
/*!40000 ALTER TABLE `medical_record` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `microtime_set`
--

DROP TABLE IF EXISTS `microtime_set`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `microtime_set` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `Owner_id` int(10) unsigned NOT NULL COMMENT 'alias Group_id',
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `microtime_XTS_uq` (`Name`,`Owner_id`),
  KEY `microtime_XTS_fk_XTS000_idx` (`RevisedRow_id`),
  KEY `microtime_XMS_fk_XG_idx` (`Owner_id`),
  CONSTRAINT `microtime_XMS_fk_XG` FOREIGN KEY (`Owner_id`) REFERENCES `group` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `microtime_XTS_fk_XTS000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `microtime_set` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `microtime_set`
--

LOCK TABLES `microtime_set` WRITE;
/*!40000 ALTER TABLE `microtime_set` DISABLE KEYS */;
/*!40000 ALTER TABLE `microtime_set` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `microtime_unit`
--

DROP TABLE IF EXISTS `microtime_unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `microtime_unit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `MicrotimeSet_id` int(10) unsigned NOT NULL,
  `DayUnit_id` int(10) unsigned NOT NULL,
  `StartHour` time NOT NULL,
  `EndHour` time NOT NULL,
  `Name` varchar(45) DEFAULT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `microtime_XTU_uq` (`DayUnit_id`,`StartHour`,`EndHour`,`MicrotimeSet_id`),
  KEY `microtime_XTU_fk_XTS_idx` (`MicrotimeSet_id`),
  KEY `microtime_XTU_fk_XDU_idx` (`DayUnit_id`),
  KEY `microtime_XTU_fk_XTU000_idx` (`RevisedRow_id`),
  CONSTRAINT `microtime_XTU_fk_XDU` FOREIGN KEY (`DayUnit_id`) REFERENCES `day_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `microtime_XTU_fk_XTS` FOREIGN KEY (`MicrotimeSet_id`) REFERENCES `microtime_set` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `microtime_XTU_fk_XTU000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `microtime_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `microtime_unit`
--

LOCK TABLES `microtime_unit` WRITE;
/*!40000 ALTER TABLE `microtime_unit` DISABLE KEYS */;
/*!40000 ALTER TABLE `microtime_unit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `not_labelled_inventory`
--

DROP TABLE IF EXISTS `not_labelled_inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `not_labelled_inventory` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `InventoryType_id` int(10) unsigned NOT NULL,
  `Owner_id` int(10) unsigned NOT NULL,
  `Space_id` int(10) unsigned NOT NULL,
  `Quantity` int(10) unsigned NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `inventory_XNLI_fk_XIT_idx` (`InventoryType_id`),
  KEY `inventory_XNLI_fk_XG_idx` (`Owner_id`),
  KEY `inventory_XNLI_fk_XS_idx` (`Space_id`),
  KEY `inventory_XNLI_fk_XNLI000_idx` (`RevisedRow_id`),
  CONSTRAINT `inventory_XNLI_fk_XG` FOREIGN KEY (`Owner_id`) REFERENCES `group` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `inventory_XNLI_fk_XIT` FOREIGN KEY (`InventoryType_id`) REFERENCES `inventory_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `inventory_XNLI_fk_XNLI000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `not_labelled_inventory` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `inventory_XNLI_fk_XS` FOREIGN KEY (`Space_id`) REFERENCES `space` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `not_labelled_inventory`
--

LOCK TABLES `not_labelled_inventory` WRITE;
/*!40000 ALTER TABLE `not_labelled_inventory` DISABLE KEYS */;
/*!40000 ALTER TABLE `not_labelled_inventory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `person`
--

DROP TABLE IF EXISTS `person`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `person` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(45) NOT NULL,
  `MiddleName` varchar(45) DEFAULT NULL,
  `LastName` varchar(45) DEFAULT NULL,
  `Sex` tinyint(1) NOT NULL,
  `BirthDate` date NOT NULL,
  `BirthPlace` varchar(45) NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `person_XP_uq` (`FirstName`,`MiddleName`,`LastName`,`Sex`,`BirthDate`,`BirthPlace`),
  KEY `person_XP_fk_XP000_idx` (`RevisedRow_id`),
  CONSTRAINT `person_XP_fk_XP000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `person` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `person`
--

LOCK TABLES `person` WRITE;
/*!40000 ALTER TABLE `person` DISABLE KEYS */;
INSERT INTO `person` VALUES (1,'hendra',NULL,'gunawan',1,'1980-10-27','jakarta',NULL,1,0),(2,'anisa',NULL,'fahmi',0,'1982-12-15','bandung',NULL,1,0),(3,'khoirul','azzam','fathurroyyan',1,'2009-12-02','bandung',NULL,1,0),(6,'Ronron','Ronaldikin','Syahronny',1,'1995-10-17','Bogor',NULL,1,0),(8,'Raden Mas','Singomenggolo','Jalmowono',1,'2013-01-17','Pracimantoro',NULL,1,0),(10,'Soesilo','Brambang','Yudhoyono',1,'1995-06-07','Pacitan',NULL,1,0),(11,'Regina','Sondini','Saragih',0,'1994-08-22','Cirebon',NULL,1,0);
/*!40000 ALTER TABLE `person` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `person_attendance`
--

DROP TABLE IF EXISTS `person_attendance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `person_attendance` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Person_id` int(10) unsigned NOT NULL COMMENT 'person is student or lecturer',
  `LectureUnit_id` int(10) unsigned NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `lecture_XPA_uq` (`Person_id`,`LectureUnit_id`),
  KEY `lecture_XPA_fk_XLU_idx` (`LectureUnit_id`),
  KEY `lecture_XPA_fk_XPA000_idx` (`RevisedRow_id`),
  KEY `lecture_XPA_fk_XP_idx` (`Person_id`),
  CONSTRAINT `lecture_XPA_fk_XLU` FOREIGN KEY (`LectureUnit_id`) REFERENCES `lecture_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `lecture_XPA_fk_XP` FOREIGN KEY (`Person_id`) REFERENCES `person` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `lecture_XPA_fk_XPA000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `person_attendance` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `person_attendance`
--

LOCK TABLES `person_attendance` WRITE;
/*!40000 ALTER TABLE `person_attendance` DISABLE KEYS */;
/*!40000 ALTER TABLE `person_attendance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `person_log`
--

DROP TABLE IF EXISTS `person_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `person_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(45) NOT NULL,
  `MiddleName` varchar(45) DEFAULT NULL,
  `LastName` varchar(45) DEFAULT NULL,
  `Sex` tinyint(1) NOT NULL,
  `BirthDate` date NOT NULL,
  `BirthPlace` varchar(45) NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `person_log`
--

LOCK TABLES `person_log` WRITE;
/*!40000 ALTER TABLE `person_log` DISABLE KEYS */;
INSERT INTO `person_log` VALUES (1,'Ronron','Ronaldo','Syahronny',1,'2013-01-26','Kalikoa',6,0),(2,'Ronron','Ronaldikin','Syahronny',1,'1995-10-17','Kalikoa',6,0),(3,'Sonny','Sontoloyo','Makmur',1,'1994-03-07','Semarang',12,1);
/*!40000 ALTER TABLE `person_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `person_participate_in_recruitment`
--

DROP TABLE IF EXISTS `person_participate_in_recruitment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `person_participate_in_recruitment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `RecruitmentStep_id` int(10) unsigned NOT NULL,
  `Person_id` int(10) unsigned NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `recruitment_XPPIR_uq` (`RecruitmentStep_id`,`Person_id`),
  KEY `recruitment_XPPIR_fk_XRS_idx` (`RecruitmentStep_id`),
  KEY `recruitment_XPPIR_fk_XP_idx` (`Person_id`),
  KEY `recruitment_XPPIR_fk_XPPIR000_idx` (`RevisedRow_id`),
  CONSTRAINT `recruitment_XPPIR_fk_XP` FOREIGN KEY (`Person_id`) REFERENCES `person` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `recruitment_XPPIR_fk_XPPIR000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `person_participate_in_recruitment` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `recruitment_XPPIR_fk_XRS` FOREIGN KEY (`RecruitmentStep_id`) REFERENCES `recruitment_step` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `person_participate_in_recruitment`
--

LOCK TABLES `person_participate_in_recruitment` WRITE;
/*!40000 ALTER TABLE `person_participate_in_recruitment` DISABLE KEYS */;
/*!40000 ALTER TABLE `person_participate_in_recruitment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `person_relationship`
--

DROP TABLE IF EXISTS `person_relationship`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `person_relationship` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Person_id` int(10) unsigned NOT NULL,
  `RelationshipType_id` int(10) unsigned NOT NULL COMMENT 'alias Lookup_id',
  `OtherPerson_id` int(10) unsigned NOT NULL COMMENT 'alias Person_id',
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `person_XPR_uq` (`Person_id`,`RelationshipType_id`,`OtherPerson_id`),
  KEY `person_XPR_fk_XP1_idx` (`Person_id`),
  KEY `person_XPR_fk_XP2_idx` (`OtherPerson_id`),
  KEY `person_XPR_fk_XPR000_idx` (`RevisedRow_id`),
  KEY `person_XPR_fk_XL_idx` (`RelationshipType_id`),
  CONSTRAINT `person_XPR_fk_XL` FOREIGN KEY (`RelationshipType_id`) REFERENCES `lookup` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `person_XPR_fk_XP1` FOREIGN KEY (`Person_id`) REFERENCES `person` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `person_XPR_fk_XP2` FOREIGN KEY (`OtherPerson_id`) REFERENCES `person` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `person_XPR_fk_XPR000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `person_relationship` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `person_relationship`
--

LOCK TABLES `person_relationship` WRITE;
/*!40000 ALTER TABLE `person_relationship` DISABLE KEYS */;
/*!40000 ALTER TABLE `person_relationship` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `position_in_structure`
--

DROP TABLE IF EXISTS `position_in_structure`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `position_in_structure` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `Group_id` int(10) unsigned NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `group_XPIS_uq` (`Name`,`Group_id`),
  KEY `group_XPIS_fk_XPIS000_idx` (`RevisedRow_id`),
  KEY `group_XPIS_fk_XG_idx` (`Group_id`),
  CONSTRAINT `group_XPIS_fk_XG` FOREIGN KEY (`Group_id`) REFERENCES `group` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `group_XPIS_fk_XPIS000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `position_in_structure` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `position_in_structure`
--

LOCK TABLES `position_in_structure` WRITE;
/*!40000 ALTER TABLE `position_in_structure` DISABLE KEYS */;
INSERT INTO `position_in_structure` VALUES (1,'Head',1,NULL,1,0),(2,'Vice Head',1,NULL,1,0),(3,'Secretary',1,NULL,1,0),(4,'Treasurer',1,NULL,1,0),(5,'Staff',1,NULL,1,0);
/*!40000 ALTER TABLE `position_in_structure` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produced_inventory_in_lecture_unit`
--

DROP TABLE IF EXISTS `produced_inventory_in_lecture_unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produced_inventory_in_lecture_unit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NotLabelledInventory_id` int(10) unsigned NOT NULL,
  `Quantity` int(10) unsigned NOT NULL,
  `LectureUnit_id` int(10) unsigned NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `inventory_XPIILU_fk_XIT_idx` (`NotLabelledInventory_id`),
  KEY `inventory_XPIILU_fk_XPIILU000_idx` (`RevisedRow_id`),
  KEY `inventory_XPIILU_fk_XLU_idx` (`LectureUnit_id`),
  CONSTRAINT `inventory_XPIILU_fk_XIT` FOREIGN KEY (`NotLabelledInventory_id`) REFERENCES `not_labelled_inventory` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `inventory_XPIILU_fk_XLU` FOREIGN KEY (`LectureUnit_id`) REFERENCES `lecture_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `inventory_XPIILU_fk_XPIILU000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `produced_inventory_in_lecture_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produced_inventory_in_lecture_unit`
--

LOCK TABLES `produced_inventory_in_lecture_unit` WRITE;
/*!40000 ALTER TABLE `produced_inventory_in_lecture_unit` DISABLE KEYS */;
/*!40000 ALTER TABLE `produced_inventory_in_lecture_unit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `property_type`
--

DROP TABLE IF EXISTS `property_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `property_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NameSpace` varchar(45) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `DataType` varchar(45) NOT NULL,
  `Group` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `global_XPT_uq` (`NameSpace`,`Name`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_type`
--

LOCK TABLES `property_type` WRITE;
/*!40000 ALTER TABLE `property_type` DISABLE KEYS */;
INSERT INTO `property_type` VALUES (1,'person','birth information','string',NULL),(2,'person','change name information','string',NULL),(3,'person','home address','string',NULL),(4,'person','home phone','number',NULL),(5,'person','home fax','number',NULL),(6,'person','work address','string',NULL),(7,'person','work phone','number',NULL),(8,'person','work fax','number',NULL),(9,'person','citizen number','number',NULL),(10,'person','license number','number',NULL),(11,'person','social security number','number',NULL),(12,'person','bank card number','number',NULL),(13,'person','bank name','string',NULL),(14,'person relationship','marital information','string',NULL),(15,'person relationship','deforce information','string',NULL),(16,'medical record','sickness information','string',NULL),(17,'disease','disease information','string',NULL),(18,'group / external institution','government institution status','boolean',1),(19,'group / external institution','public institution status','boolean',1),(20,'group / external institution','private institution status','boolean',1),(21,'group / external institution','commecial institution status','boolean',1),(22,'group / external institution','charity institution status','boolean',1),(23,'group / external institution','education institution status','boolean',1),(24,'group / external institution','trade institution status','boolean',1),(25,'group / external institution','medical institution status','boolean',1),(26,'group / external institution','advocacy institution status','boolean',1),(27,'group / external institution','address','number',NULL),(28,'group / external institution','phone','number',NULL),(29,'group / external institution','fax','number',NULL),(30,'group','student group status','boolean',NULL),(31,'group','lecturer group status','boolean',NULL),(32,'group','built information','string',NULL),(33,'group','terminated information','string',NULL),(34,'organization structure','built information','string',NULL),(35,'organization structure','terminated information','string',NULL),(36,'document','letter status','boolean',1),(37,'document','form status','boolean',1),(38,'document','report status','boolean',1),(39,'document','proposal status','boolean',1),(40,'document','book status','boolean',1),(41,'document','photograph status','boolean',1);
/*!40000 ALTER TABLE `property_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recruitment`
--

DROP TABLE IF EXISTS `recruitment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recruitment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Generation_id` int(10) unsigned NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Order` tinyint(1) NOT NULL,
  `Quota` int(11) DEFAULT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `recruitment_XR_uq1` (`Generation_id`,`Name`),
  UNIQUE KEY `recruitment_XR_uq2` (`Generation_id`,`Order`),
  KEY `recruitment_XR_fk_XG_idx` (`Generation_id`),
  KEY `recruitment_XR_fk_XR000_idx` (`RevisedRow_id`),
  CONSTRAINT `recruitment_XR_fk_XG` FOREIGN KEY (`Generation_id`) REFERENCES `generation` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `recruitment_XR_fk_XR000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `recruitment` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recruitment`
--

LOCK TABLES `recruitment` WRITE;
/*!40000 ALTER TABLE `recruitment` DISABLE KEYS */;
/*!40000 ALTER TABLE `recruitment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recruitment_step`
--

DROP TABLE IF EXISTS `recruitment_step`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recruitment_step` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Recruitment_id` int(10) unsigned NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Order` tinyint(1) NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `recruitment_XRS_uq1` (`Recruitment_id`,`Name`),
  UNIQUE KEY `recruitment_XRS_uq2` (`Recruitment_id`,`Order`),
  KEY `recruitment_XRS_fk_XR_idx` (`Recruitment_id`),
  KEY `recruitment_XRS_fk_XRS000_idx` (`RevisedRow_id`),
  CONSTRAINT `recruitment_XRS_fk_XR` FOREIGN KEY (`Recruitment_id`) REFERENCES `recruitment` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `recruitment_XRS_fk_XRS000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `recruitment_step` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recruitment_step`
--

LOCK TABLES `recruitment_step` WRITE;
/*!40000 ALTER TABLE `recruitment_step` DISABLE KEYS */;
/*!40000 ALTER TABLE `recruitment_step` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `report`
--

DROP TABLE IF EXISTS `report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `report` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Curriculum_id` int(10) unsigned NOT NULL,
  `Name` varchar(45) NOT NULL,
  `PublishedDate` date NOT NULL,
  `Template` text NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `report_XR_uq` (`Curriculum_id`,`Name`,`PublishedDate`),
  KEY `report_XR_fk_XC_idx` (`Curriculum_id`),
  KEY `report_XR_fk_XR000_idx` (`RevisedRow_id`),
  CONSTRAINT `report_XR_fk_XC` FOREIGN KEY (`Curriculum_id`) REFERENCES `curriculum` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `report_XR_fk_XR000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `report` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `report`
--

LOCK TABLES `report` WRITE;
/*!40000 ALTER TABLE `report` DISABLE KEYS */;
/*!40000 ALTER TABLE `report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `report_component`
--

DROP TABLE IF EXISTS `report_component`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `report_component` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Report_id` int(10) unsigned NOT NULL,
  `Course_id` int(10) unsigned NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `report_XRC_fk_XR_idx` (`Report_id`),
  KEY `report_XRC_fk_XC_idx` (`Course_id`),
  CONSTRAINT `report_XRC_fk_XC` FOREIGN KEY (`Course_id`) REFERENCES `course` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `report_XRC_fk_XR` FOREIGN KEY (`Report_id`) REFERENCES `report` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `report_component`
--

LOCK TABLES `report_component` WRITE;
/*!40000 ALTER TABLE `report_component` DISABLE KEYS */;
/*!40000 ALTER TABLE `report_component` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `space`
--

DROP TABLE IF EXISTS `space`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `space` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `Parent_id` int(10) unsigned DEFAULT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `space_XS_uq` (`Name`),
  KEY `space_XS_fk_XS000_idx` (`RevisedRow_id`),
  KEY `space_XS_fk_XS_idx` (`Parent_id`),
  CONSTRAINT `space_XS_fk_XS` FOREIGN KEY (`Parent_id`) REFERENCES `space` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `space_XS_fk_XS000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `space` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `space`
--

LOCK TABLES `space` WRITE;
/*!40000 ALTER TABLE `space` DISABLE KEYS */;
/*!40000 ALTER TABLE `space` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `space_ownership`
--

DROP TABLE IF EXISTS `space_ownership`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `space_ownership` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Group_id` int(10) unsigned NOT NULL,
  `Space_id` int(10) unsigned NOT NULL,
  `InheritToChildStatus` tinyint(1) DEFAULT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `space_XSO_uq` (`Group_id`,`Space_id`),
  KEY `space_XSO_fk_XG_idx` (`Group_id`),
  KEY `space_XSO_fk_XS_idx` (`Space_id`),
  KEY `space_XSO_fk_XSO000_idx` (`RevisedRow_id`),
  CONSTRAINT `space_XSO_fk_XG` FOREIGN KEY (`Group_id`) REFERENCES `group` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `space_XSO_fk_XS` FOREIGN KEY (`Space_id`) REFERENCES `space` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `space_XSO_fk_XSO000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `space_ownership` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `space_ownership`
--

LOCK TABLES `space_ownership` WRITE;
/*!40000 ALTER TABLE `space_ownership` DISABLE KEYS */;
/*!40000 ALTER TABLE `space_ownership` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `space_vs_time`
--

DROP TABLE IF EXISTS `space_vs_time`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `space_vs_time` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `UsedSpace_id` int(10) unsigned NOT NULL,
  `LectureUnitOccurrence_id` int(10) unsigned NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `occurrence_XSVT_fk_XUSILU_idx` (`UsedSpace_id`),
  KEY `occurrence_XSVT_fk_XLUO_idx` (`LectureUnitOccurrence_id`),
  CONSTRAINT `occurrence_XSVT_fk_XLUO` FOREIGN KEY (`LectureUnitOccurrence_id`) REFERENCES `lecture_unit_occurrence` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `occurrence_XSVT_fk_XUSILU` FOREIGN KEY (`UsedSpace_id`) REFERENCES `used_space_in_lecture_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `space_vs_time`
--

LOCK TABLES `space_vs_time` WRITE;
/*!40000 ALTER TABLE `space_vs_time` DISABLE KEYS */;
/*!40000 ALTER TABLE `space_vs_time` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `structure_member`
--

DROP TABLE IF EXISTS `structure_member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `structure_member` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `GroupStructure_id` int(10) unsigned NOT NULL,
  `PositionInStructure_id` int(10) unsigned NOT NULL,
  `Person_id` int(10) unsigned NOT NULL COMMENT 'filtered by group_member.Person_id',
  `StartDate` date NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `person_XSM_uq` (`Person_id`,`GroupStructure_id`,`PositionInStructure_id`,`StartDate`),
  KEY `person_XSM_fk_XP_idx` (`Person_id`),
  KEY `person_XSM_fk_XGS_idx` (`GroupStructure_id`),
  KEY `person_XSM_fk_XPIS_idx` (`PositionInStructure_id`),
  KEY `person_XSM_fk_XSM000_idx` (`RevisedRow_id`),
  CONSTRAINT `person_XSM_fk_XGS` FOREIGN KEY (`GroupStructure_id`) REFERENCES `group_structure` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `person_XSM_fk_XP` FOREIGN KEY (`Person_id`) REFERENCES `person` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `person_XSM_fk_XPIS` FOREIGN KEY (`PositionInStructure_id`) REFERENCES `position_in_structure` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `person_XSM_fk_XSM000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `structure_member` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `structure_member`
--

LOCK TABLES `structure_member` WRITE;
/*!40000 ALTER TABLE `structure_member` DISABLE KEYS */;
/*!40000 ALTER TABLE `structure_member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `structure_member_history`
--

DROP TABLE IF EXISTS `structure_member_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `structure_member_history` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `GroupStructure_id` int(10) unsigned NOT NULL,
  `PositionInStructure_id` int(10) unsigned NOT NULL,
  `Person_id` int(10) unsigned NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `group_XSMH_fk_XGS_idx` (`GroupStructure_id`),
  KEY `group_XSMH_fk_XPIS_idx` (`PositionInStructure_id`),
  KEY `group_XSMH_fk_XG_idx` (`Person_id`),
  CONSTRAINT `group_XSMH_fk_XG` FOREIGN KEY (`Person_id`) REFERENCES `person` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `group_XSMH_fk_XGS` FOREIGN KEY (`GroupStructure_id`) REFERENCES `group_structure` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `group_XSMH_fk_XPIS` FOREIGN KEY (`PositionInStructure_id`) REFERENCES `position_in_structure` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `structure_member_history`
--

LOCK TABLES `structure_member_history` WRITE;
/*!40000 ALTER TABLE `structure_member_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `structure_member_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subject` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Parent_id` int(10) unsigned NOT NULL,
  `Name` varchar(45) NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subject_XS_uq` (`Parent_id`,`Name`),
  KEY `subject_XS_fk_XS_idx` (`Parent_id`),
  KEY `subject_XS_fk_XS000_idx` (`RevisedRow_id`),
  CONSTRAINT `subject_XS_fk_XS` FOREIGN KEY (`Parent_id`) REFERENCES `subject` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `subject_XS_fk_XS000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `subject` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject`
--

LOCK TABLES `subject` WRITE;
/*!40000 ALTER TABLE `subject` DISABLE KEYS */;
/*!40000 ALTER TABLE `subject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject_in_assessment_unit`
--

DROP TABLE IF EXISTS `subject_in_assessment_unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subject_in_assessment_unit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `AssessmentUnit_id` int(10) unsigned NOT NULL,
  `Subject_id` int(10) unsigned NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `assessment_XSIAU_uq` (`AssessmentUnit_id`,`Subject_id`),
  KEY `assessment_XSIAU_FK_XAU_idx` (`AssessmentUnit_id`),
  KEY `assessment_XSIAU_FK_XS_idx` (`Subject_id`),
  KEY `assessment_XSIAU_fk_XSIAU000_idx` (`RevisedRow_id`),
  CONSTRAINT `assessment_XSIAU_fk_XAU` FOREIGN KEY (`AssessmentUnit_id`) REFERENCES `assessment_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `assessment_XSIAU_fk_XS` FOREIGN KEY (`Subject_id`) REFERENCES `subject` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `assessment_XSIAU_fk_XSIAU000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `subject_in_assessment_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject_in_assessment_unit`
--

LOCK TABLES `subject_in_assessment_unit` WRITE;
/*!40000 ALTER TABLE `subject_in_assessment_unit` DISABLE KEYS */;
/*!40000 ALTER TABLE `subject_in_assessment_unit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject_in_course`
--

DROP TABLE IF EXISTS `subject_in_course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subject_in_course` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Cource_id` int(10) unsigned NOT NULL,
  `Subject_id` int(10) unsigned NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `course_XSIC_fk_XC_idx` (`Cource_id`),
  KEY `course_XSIC_fk_XS_idx` (`Subject_id`),
  CONSTRAINT `course_XSIC_fk_XC` FOREIGN KEY (`Cource_id`) REFERENCES `course` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `course_XSIC_fk_XS` FOREIGN KEY (`Subject_id`) REFERENCES `subject` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject_in_course`
--

LOCK TABLES `subject_in_course` WRITE;
/*!40000 ALTER TABLE `subject_in_course` DISABLE KEYS */;
/*!40000 ALTER TABLE `subject_in_course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject_in_lecture_unit`
--

DROP TABLE IF EXISTS `subject_in_lecture_unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subject_in_lecture_unit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `LectureUnit_id` int(10) unsigned NOT NULL,
  `Subject_id` int(10) unsigned NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `lecture_XSILU_uq` (`LectureUnit_id`,`Subject_id`),
  KEY `lecture_XSILU_fk_XLU_idx` (`LectureUnit_id`),
  KEY `lecture_XSILU_fk_XS_idx` (`Subject_id`),
  KEY `lecture_XSILU_fk_XSILU000_idx` (`RevisedRow_id`),
  CONSTRAINT `lecture_XSILU_fk_XLU` FOREIGN KEY (`LectureUnit_id`) REFERENCES `lecture_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `lecture_XSILU_fk_XS` FOREIGN KEY (`Subject_id`) REFERENCES `subject` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `lecture_XSILU_fk_XSILU000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `subject_in_lecture_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject_in_lecture_unit`
--

LOCK TABLES `subject_in_lecture_unit` WRITE;
/*!40000 ALTER TABLE `subject_in_lecture_unit` DISABLE KEYS */;
/*!40000 ALTER TABLE `subject_in_lecture_unit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject_tag`
--

DROP TABLE IF EXISTS `subject_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subject_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` int(10) unsigned NOT NULL,
  `Parent_id` int(10) unsigned DEFAULT NULL,
  `Subject_id` int(10) unsigned DEFAULT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `subject_XST_fk_XST_idx` (`Parent_id`),
  KEY `subject_XST_fk_XS_idx` (`Subject_id`),
  KEY `subject_XST_fk_XST000_idx` (`RevisedRow_id`),
  CONSTRAINT `subject_XST_fk_XS` FOREIGN KEY (`Subject_id`) REFERENCES `subject` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `subject_XST_fk_XST` FOREIGN KEY (`Parent_id`) REFERENCES `subject_tag` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `subject_XST_fk_XST000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `subject_tag` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject_tag`
--

LOCK TABLES `subject_tag` WRITE;
/*!40000 ALTER TABLE `subject_tag` DISABLE KEYS */;
/*!40000 ALTER TABLE `subject_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `used_inventory_in_lecture_unit`
--

DROP TABLE IF EXISTS `used_inventory_in_lecture_unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `used_inventory_in_lecture_unit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Inventory_id` int(10) unsigned NOT NULL,
  `LectureUnit_id` int(10) unsigned NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `inventory_XUIILU_fk_XI_idx` (`Inventory_id`),
  KEY `inventory_XUIILU_fk_XUIILU000_idx` (`RevisedRow_id`),
  KEY `inventory_XUIILU_fk_XLU_idx` (`LectureUnit_id`),
  CONSTRAINT `inventory_XUIILU_fk_XI` FOREIGN KEY (`Inventory_id`) REFERENCES `inventory` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `inventory_XUIILU_fk_XLU` FOREIGN KEY (`LectureUnit_id`) REFERENCES `lecture_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `inventory_XUIILU_fk_XUIILU000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `used_inventory_in_lecture_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `used_inventory_in_lecture_unit`
--

LOCK TABLES `used_inventory_in_lecture_unit` WRITE;
/*!40000 ALTER TABLE `used_inventory_in_lecture_unit` DISABLE KEYS */;
/*!40000 ALTER TABLE `used_inventory_in_lecture_unit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `used_material_in_lecture_unit`
--

DROP TABLE IF EXISTS `used_material_in_lecture_unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `used_material_in_lecture_unit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Material_id` int(10) unsigned NOT NULL,
  `Quantity` float unsigned NOT NULL,
  `LectureUnit_id` int(10) unsigned NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `material_XUMILU_XM_idx` (`Material_id`),
  KEY `material_XUMILU_fk_XUMILU000_idx` (`RevisedRow_id`),
  KEY `material_XUMILU_fk_XLU_idx` (`LectureUnit_id`),
  CONSTRAINT `material_XUMILU_fk_XLU` FOREIGN KEY (`LectureUnit_id`) REFERENCES `lecture_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `material_XUMILU_fk_XM` FOREIGN KEY (`Material_id`) REFERENCES `material` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `material_XUMILU_fk_XUMILU000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `used_material_in_lecture_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `used_material_in_lecture_unit`
--

LOCK TABLES `used_material_in_lecture_unit` WRITE;
/*!40000 ALTER TABLE `used_material_in_lecture_unit` DISABLE KEYS */;
/*!40000 ALTER TABLE `used_material_in_lecture_unit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `used_space_in_lecture_unit`
--

DROP TABLE IF EXISTS `used_space_in_lecture_unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `used_space_in_lecture_unit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Space_id` int(10) unsigned NOT NULL,
  `LectureUnit_id` int(10) unsigned NOT NULL,
  `RevisedRow_id` int(10) unsigned DEFAULT NULL,
  `TippedStatus` tinyint(1) NOT NULL,
  `DeletedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `space_XUSILU_fk_XS_idx` (`Space_id`),
  KEY `space_XUSILU_fk_XLU_idx` (`LectureUnit_id`),
  KEY `space_XUSILU_fk_XUSILU000_idx` (`RevisedRow_id`),
  CONSTRAINT `space_XUSILU_fk_XLU` FOREIGN KEY (`LectureUnit_id`) REFERENCES `lecture_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `space_XUSILU_fk_XS` FOREIGN KEY (`Space_id`) REFERENCES `space` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `space_XUSILU_fk_XUSILU000` FOREIGN KEY (`RevisedRow_id`) REFERENCES `used_space_in_lecture_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `used_space_in_lecture_unit`
--

LOCK TABLES `used_space_in_lecture_unit` WRITE;
/*!40000 ALTER TABLE `used_space_in_lecture_unit` DISABLE KEYS */;
/*!40000 ALTER TABLE `used_space_in_lecture_unit` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-01-10  9:42:58
