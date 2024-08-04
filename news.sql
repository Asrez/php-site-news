-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
<<<<<<< HEAD
<<<<<<< HEAD
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2024 at 01:05 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4
=======
=======
>>>>>>> ccb84342f5e2d3160d997b6013b7247ad6100933
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 30, 2024 at 04:45 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13
<<<<<<< HEAD
>>>>>>> ccb84342f5e2d3160d997b6013b7247ad6100933
=======
>>>>>>> ccb84342f5e2d3160d997b6013b7247ad6100933

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

DROP TABLE IF EXISTS `about_us`;
CREATE TABLE IF NOT EXISTS `about_us` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `title` varchar(1000) COLLATE utf8mb3_persian_ci NOT NULL,
  `address` text COLLATE utf8mb3_persian_ci NOT NULL,
  `email` varchar(10000) COLLATE utf8mb3_persian_ci NOT NULL,
  `tel` bigint NOT NULL,
  `post_code` bigint NOT NULL,
  `about_us_text` text COLLATE utf8mb3_persian_ci NOT NULL,
  `link` mediumtext COLLATE utf8mb3_persian_ci,
  `tag` varchar(5000) COLLATE utf8mb3_persian_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_persian_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `title`, `address`, `email`, `tel`, `post_code`, `about_us_text`, `link`, `tag`) VALUES
(1, 'اینلاین', 'تهران - خیابان میرزای شیرازی - کوچه شهید عزیزاللهی - پلاک ۱۵', 'advertise@khabarinline.ir', 555143637, 15982354852, ' خبر اینلاین که کار خود را از سال ۱۳۸۷ شروع کرده است تلاش دارد آخرین تحلیل‌ها و گزارش‌ها از مهم‌ترین اتفاقات روز ایران و جهان را به صورت آنلاین در اختیار مخاطبان خود قرار دهد.\r\n\r\nمشی رسانه‌ای این سایت، تحلیلی - خبری است و اعضای تحریریه این مجموعه می‌کوشند از قالب ظاهری خبرها فراتر رفته و به زوایای پنهان و آشکار حوادث سرک بکشند و با کندوکاو بیشتر، ناگفته‌ها و وجوه نامکشوف وقایع و حوادث را بیابند.\r\n\r\nاین مجموعه رسانه‌ای خود را در امر اطلاع‌رسانی مستقل می‌داند و در چارچوب قوانین نظام جمهوری اسلامی و تعهد به آرمان‌های انقلاب اسلامی و امام راحل و شهیدان انقلاب، از درغلتیدن به تمایلات حزبی و جناحی پرهیز دارد.\r\n\r\nاین مجموعه اما نقد و تحلیل کارشناسانه دستگاه‌ها، عملکرد مسئولان و احزاب را وظیفه ذاتی خود می‌پندارد و آن را با هدف ارتقای دانایی جامعه، حق پرسشگری شهروندان و وظیفه پاسخگویی مسئولان با جدیت دنبال می‌کند.\r\n\r\nتحریریه خبر اینلاین همچنین با بهره‌مندی از همکاران حرفه‌ای و با سابقه می‌کوشد عرصه‌های جدیدی در اطلاع‌رسانی بهنگام و شفاف بجوید و بگشاید', 'khabarinline.ir/news/822037', 'درباره ما');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(500) COLLATE utf8mb3_persian_ci NOT NULL,
  `username` varchar(500) COLLATE utf8mb3_persian_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb3_persian_ci NOT NULL,
  `image` varchar(500) COLLATE utf8mb3_persian_ci DEFAULT 'user.png',
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `id` (`id`,`username`),
  UNIQUE KEY `name` (`name`),
  KEY `id_2` (`id`),
  KEY `id_3` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_persian_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `password`, `image`, `date`) VALUES
(1, 'zahra', 'admin', '12345678', 'user.png', '2024-07-10'),
(2, 'ALI', 'admin2', '1212', 'avatar.png', '2024-07-31'),
(13, 'admin', 'MARI', '123', 'user.png', '2024-07-29'),
(14, 'کریم', 'karim', '1234', 'user.png', '2024-07-02');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `publicationdate` datetime NOT NULL,
<<<<<<< HEAD
<<<<<<< HEAD
  `title` varchar(500) NOT NULL,
  `summery` text NOT NULL,
  `content` longtext NOT NULL,
  `image` varchar(1000) NOT NULL,
  `source` varchar(1000) DEFAULT NULL,
  `viewcount` bigint(20) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `slug` varchar(1000) DEFAULT NULL,
  `verify` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
=======
=======
>>>>>>> ccb84342f5e2d3160d997b6013b7247ad6100933
  `title` varchar(500) COLLATE utf8mb3_persian_ci NOT NULL,
  `summery` text COLLATE utf8mb3_persian_ci NOT NULL,
  `content` longtext COLLATE utf8mb3_persian_ci NOT NULL,
  `image` varchar(1000) COLLATE utf8mb3_persian_ci NOT NULL,
  `source` varchar(1000) COLLATE utf8mb3_persian_ci DEFAULT NULL,
  `viewcount` bigint DEFAULT '0',
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `admin_id` bigint UNSIGNED DEFAULT NULL,
  `slug` varchar(1000) COLLATE utf8mb3_persian_ci DEFAULT NULL,
  `verify` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `category_id` (`admin_id`),
  KEY `admin_id` (`admin_id`),
  KEY `id` (`id`),
  KEY `category_id_2` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_persian_ci;
<<<<<<< HEAD
>>>>>>> ccb84342f5e2d3160d997b6013b7247ad6100933
=======
>>>>>>> ccb84342f5e2d3160d997b6013b7247ad6100933

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `publicationdate`, `title`, `summery`, `content`, `image`, `source`, `viewcount`, `category_id`, `admin_id`, `slug`, `verify`) VALUES
(1, '2024-07-14 10:31:56', 'ytrfyt', 'fdxgfdgfx', 'gfdgfdfdfhdggggggggggggggg', '3.jpg', 'hgf', 1, 6, 14, 'vxvxxxxxxxxxxxxcb', 1),
(2, '2024-07-14 11:32:23', 'fhngvf', 'gffffffffffbn', 'gfnb vnghnbngbfj', '6.jpg', 'fvghdhf', 2, 7, 2, 'ghvnkgnj', 1),
(3, '2024-07-14 10:45:15', 'dfzgdfdfxv', 'zdfgdf', 'agdeeeeeeeeeeeeeee', '1.jpg', 'fdfv', 2, 16, 1, 'sbfedz', 1),
(4, '2024-07-14 10:45:17', 'dfzbvsdfggdfdfxv', 'zdfgdf', 'agdeeeeeeeeeeeeeee', '1.jpg', 'fdfv', 3, 17, 2, 'sbfedccz', 1),
(5, '2024-07-02 08:48:35', 'سعید جلیلی با تشکیل دولت سایه اشراف کاملی به مسائل کشور پیدا کرده است', 'کانون دانشگاهیان ایران اسلامی در بیانیه‌ای نوشت: سعید جلیلی با تشکیل دولت سایه اشراف و احاطه کامل به مسائل، فرصت‌ها و ظرفیت‌ها پیدا کرده است.', 'کانون دانشگاهیان ایران اسلامی در بیانیه‌ای از سعید جلیلی در مرحله دوم انتخابات ریاست جمهوری چهاردهم حمایت کرد.\r\n\r\nمتن این بیانیه به شرح ذیل است:\r\n\r\nبسمه تعالی\r\nجمعه ۱۵ تیر، روز برگزاری مرحله دوم انتخابات سرنوشت‌ساز ریاست جمهوری است و رقابت فشرده‌ای بین نامزد‌های دو جریان فکری و دو اردوگاه سیاسی عمده در ایران رقم می‌خورد.\r\n\r\nدکتر پزشکیان وابسته به احزاب و تشکل‌هایی است که ۳۲ سال قوه مجریه را در اختیار داشته‌اند و آخرین مورد آن ۸ سال ریاست جمهوری روحانی بوده که با شعار‌های پر طمطراقِ رفع کامل تحریم‌ها و حل مشکلات اقتصادی، چرخیدن چرخ اقتصاد و ... افکار عمومی را مجذوب ساخت ولی نه تنها تحریم‌ها لغو نشد بلکه به دلیل تعلل، کم کاری، روحیه اشرافیگری، سوءاستفاده از موقعیت، فساد و دیپلماسی التماسی، روز به روز شرایط زندگی بر مردم را دشوارتر و نارضایتی را بیشتر کرد. خلاصه اینکه افزایش نقدینگی، تورم لجام گسیخته، رشد اقتصادی نزدیک به صفر، افزایش نرخ بیکاری، تعطیلی پروژه‌های عمرانی و زیرساختی از جمله توقف مسکن مهر سبب شد که کشور دچار خسارت‌های جبران ناپذیری شود.\r\n\r\nغربگرایان در پایان دوره موسوم به اصلاحات که کشور را با تنش‌های جدی مواجه ساخت، اعلام کردند رئیس‌جمهور اختیاراتی ندارد و صرفا یک تدارکاتچی است! و در پایان دوره روحانی هم مدعی شدند، نگذاشتند تحریم‌ها را برداریم، و اینک همین جماعت که می‌گفتند: «نمی شود، نمی‌گذارند، امیدی نیست و...»، مجدد وارد کارزار انتخاباتی شده‌اند و با توسل به شیوه‌های جنگ روانی، دوقطبی‌سازی جامعه، دامن زدن به مباحث قومیتی و مذهبی می‌کوشند تا مجدداً ۸ سال دیگر زمام قوه مجریه و مدیریت کشور را در دست بگیرند و شیوه‌های ناصواب و زیان‌بار گذشته را در جهت اهداف باندی و جناحی خود احیاء کنند!\r\n\r\nدر این شرایط خطیر با درود به شهدای مظلوم پرواز اردیبهشت به ویژه سیدالشهدای خدمت آیت‌الله رئیسی که برای خدمت به مردم و پیشرفت کشور سر از پا نمی‌شناخت و با روحیه انقلابی، پرکاری و خستگی ناپذیری اقداماتی اساسی را در کمتر از سه سال رقم زد، در انتخاب جایگزین این عالم مجاهد، شخصیتی را بر می‌گزینیم که مثل او دلسوز، پرتلاش، نستوه، صادق، ساده‌زیست، متخلق، ولایتمدار، قانون‌گرا، سلیم‌النفس، فسادستیز، مدافع حقوق مردم، حامی محرومان، پای‌بند به شایسته سالاری، با برنامه، جامع الاطراف، آینده نگر و اهل تعامل با دنیا باشد و واجد این ویژگی‌ها کسی نیست جز برادر ایثارگر و جانباز دکتر سعید جلیلی که تخصص و تجربه او در علوم سیاسی و روابط بین الملل زبانزد خاص و عام است و با تشکیل دولت سایه در ۱۱ سال گذشته اشراف و احاطه کامل به مسائل و چالش‌ها و نیز فرصت‌ها و ظرفیت‌ها پیدا کرده است به گونه‌ای که از فردای انتخابات می‌تواند اقدامات مبنایی و تحولی خویش برای بهبود وضع معیشتی و اقتصادی مردم و کشور را آغاز کند؛ لذا کانون دانشگاهیان ایران اسلامی از همه اساتید، دانشجویان و تمامی هم میهنان دوستدار عزت و عظمت ایران سربلند در داخل و خارج از کشور دعوت می‌کند تا با رای به سعید جمهور موجبات سرافرازی کشور عزیزمان را فراهم سازند و پرچم کار و فعالیتی را که شهید رئیسی برافراشت همچنان در اهتزاز نگه دارند.', 'o.jpg', 'کانون دانشگاهیان ایران اسلامی', 40, 15, 13, 'uygfusydgkcjhdgbvhcxbgjhvbgxcjhvh', 1),
(6, '2024-07-02 08:50:55', 'نگاهی به ابعاد حقوقی بازی همستر کامبت', 'هرچند قانون جامع و واحدی ناظر بر بازی همستر کامبت و موارد مشابه وجود ندارد، اما با اندکی مطالعه قوانین تا حدودی این خلأ قانونی جبران می‌شود.', '\r\nقابلیت دیگری که در این بازی‌بات وجود دارد، قابلیت دعوت کردن یا invite فرد دیگری جهت دریافت پاداش است که از طریق «کد ریفرال» صورت می‌گیرد که حتی اگر اطلاعات حقیقی خود را به بازی نداده باشید، این کد به صورت اختصاصی نسبت به ردیابی الگوی الگوریتمی روابط شما با افراد دیگر و در نتیجه کشف هویت واقعی از طریق نصب انواع بدافزار بر روی گوشی و یا ساخت هویت‌های جعلی با استفاده از سیستم مهندسی اجتماعی اقدام خواهد کرد و به احتمال دیگری، چه بسا به دلیل نامشخص بودن نتیجه و سرنوشت بازی و بالا بودن تعداد کاربران استفاده‌کننده از آن، به طرح پانزی (فروپاشی بازی) منجر خواهد شد. چرا که دور و تسلسلی در زنجیره کاربران دومینووار ایجاد خواهد کرد که پایان آن غیرقابل پیش‌بینی است.\r\n\r\nشایان ذکر است که کد ریفرال (Referral Code)، با نام ثانوی کد ارجاع، به‌منظور معرفی و جذب کاربران جدید و نوعی بازاریابی دهان به دهان یا (Word of Mouth Marketing) است و امکان اشتراک از طریق پیامک، ایمیل و یا ... شما را دارد. یکی از نکاتی که می‌تواند تردید در ربایش اطلاعات افراد توسط این کد را تقویت نماید، این است که زمانی که فرد جدید با استفاده از کد ریفرال شما در پلتفرم و یا وب‌سایت مدنظر ثبت‌نام می‌کند، هر دو کاربر (معرفی‌کننده و معرفی‌شونده) پاداش را دریافت می‌کنند و این امری تصادفی نیست.\r\n\r\n- شرکت سازنده بازی همستر کامبت\r\nگفته می‌شود، این بازی یک ربات ساده تلگرامی است و هیچ اطلاعات خاصی از کاربران خود دریافت نمی‌کند؛ اما هشدار‌های جدی درباره آن توسط رسانه‌های برخی کشورها، چون جمهوری اوکراین، ازبکستان و فدراسیون روسیه داده شده است. منبع ایجادکننده و ثبت‌کننده آن به طور قطع مشخص نیست؛ اما بر اساس گمانه‌زنی‌ها، با توجه به پسوند دامنه ثبت بازی (io)، به نظر بازی به شرکت با مسئولیت محدود Arenum با طراحان روسی تعلق دارد. در یک جا موقعیت مکانی شرکت، قبرس با طراح Eduard Gurinovich روسی و دو سرمایه‌گذار از لندن و بوستون (ماساچوست آمریکا) و در جایی دیگر، موقعیت مکانی آن، استونی با طراحان روسی (Eduard Gurinovich، Viacheslav Tarasov، Evgeny Zavalov، Alexander Zelenshikov و Alexander Pasechink) و سرمایه‌گذارانی از کشور‌های مختلف، اَوِستار (AVSTAR) مستقر در جاکارتا و اندونزی، BCA Investments مستقر در آمستردام/هلند، CSP DAO در جزایر کیمن، DCT Capital در دهلی نو/هند، IOBC Capital در سنگاپور) مشاهده می‌شود که نام یک فرد در هر دو اطلاعات ثبت شده مشابه است و آن فرد Eduard Gurinovich است؛ هرچند تعلق بازی به این شرکت، صرفا در حد ظن است، لیکن به فرض یقین به موضوع، به دلیل این‌که قوانین مربوط به ذخیره‌سازی داده در کشور‌ها و به ویژه قوانین ناظر بر فعالیت شرکت‌های تجاری خصوصی و عمومی، در عرصه بین‌الملل متفاوت است.\r\n\r\nبه عنوان مثال، بر اساس قوانین مربوط به ذخیره‌سازی داده مصوب ۲۰۱۵ در کشور روسیه و یا قانون ناظر بر حفظ داده اشخاص حقیقی داده‌پرداز و جابجایی این داده‌ها مصوب ۲۰۱۸ قبرس، امکان دسترسی دستگاه‌های امنیتی یا نهاد‌های عمومی کنترل‌گر، به داده‌های شخصی کاربران نرم‌افزار‌ها و پیام‌رسان‌ها اعم از تصاویر، ویدئوها، موقعیت مکانی کاربر و ... فراهم می‌شود، موضوع به لحاظ گره خوردن با منافع ملی، حفظ نظم عمومی و صیانت از حقوق شهروندی، حائز اهمیت بوده و بررسی دقیق منشأ و مبنای عرضه‌کننده و تیم توسعه‌دهنده آن، توسط دستگاه قضایی امری ضروری به نظر می‌رسد.\r\n\r\n- ریسک‌پذیر بودن بازی همستر کامبت\r\nافزایش تعداد کاربران ممکن است به دلیل جذابیت سودآوری، افزایش صرافی‌ها و ماینر‌ها را به دنبال داشته باشد و این می‌تواند سبب تمرکز قدرت هشینگ در بین چندین گروه شود که امری بس ریسک‌پذیر بوده، امنیت شبکه را به خطر انداخته و احتمال حملات هکری را بیشتر می‌کند.\r\n\r\nدر هنگام شروع بازی‌بات، «کد جاوا اسکریپت» یا JavaScript در مرورگر به اجرا درمی‌آید که این کد می‌تواند پردازنده دستگاه را فریفته و موجبات سوءاستفاده برخی سودجویان رمزارز را فراهم کند.\r\n\r\nدستوراتی که به کد‌های جاوا اسکریپت ساختار می‌بخشند، متنوع بوده و غالبا بدون دخالت کاربر یا خودفراخوان Self-Calling، پردازش و اجراء می‌شوند. این کد به دلیل تعاملی‌تر بودن، از امنیت کافی برخوردار نیست، ابزار‌های مناسبی برای باگ‌گیری و تشخیص خطای کد‌های مذکور وجود ندارد و علاوه بر این، این کد‌ها صرفا از وراثت منفرد تعریف شده توسط طراح یا توسعه‌دهنده، پشتیبانی می‌کنند.\r\n\r\nمضافا این‌که عرضه و تبلیغ بازی‌بات مذکور از طریق صرفا پیام‌رسان تلگرام، شائبه ذی‌نفعی مالکان تلگرام از این بازی را تقویت می‌کند. زیرا به نظر می‌رسد به واسطه آن، به دنبال کسب درآمد از طریق رمزارز‌های جدید، معرفی گسترده بلاک چین TON و نمایاندن آن به عنوان فروشگاهی برای تمامی انواع اپلیکیشن‌ها بوده‌اند.\r\n\r\nب- جستاری در قوانین و مقررات مربوطه\r\nهرچند قانون جامع و واحدی ناظر بر این مسأله وجود ندارد؛ لیکن با اندکی مطالعه قوانین و مقررات در زمینه جرایم ارتکابی از طریق دستگاه‌های مجهز به سیستم عامل و در بستر فضای مجازی، تا حدودی این خلأ قانونی جبران می‌شود. در این رابطه، نظر خوانندگان را به قوانین ذیل در ارتباط به این مقوله، معطوف می‌دارم:\r\n\r\n- ماده ۷۵۳ قانون مجازات اسلامی \r\nبند (الف) ماده ۷۵۳ قانون مجازات اسلامی مرقوم داشته است که «تولید یا انتشار یا توزیع و در دسترس قرار دادن یا معامله داده‌ها یا نرم‌افزار‌ها یا هر نوع ابزار الکترونیکی که صرفاً به منظور ارتکاب جرایم رایانه‌ای به کار می‌رود»، مستوجب حبس از نود و یک روز تا یک سال یا جزای نقدی از بیست میلیون ریال تا هشتاد میلیون ریال یا هر دو مجازات است. بند (ج) ماده ۷۵۶ آن قانون نیز، صرفاً در مواردی که جرم توسط غیرایرانی یا ایرانی در خارج از ایران علیه سامانه‌های رایانه‌ای، مخابراتی و تارنما‌های مورداستفاده یا تحت کنترل قوای سه‌گانه یا نهاد رهبری یا نمایندگی‌های رسمی دولت یا هر نهاد و موسسه ارائه‌دهنده خدمت عمومی یا تارنما‌های دارای دامنه مرتبه بالای کد کشوری ایران و در سطح گسترده، ارتکاب یابد را مستوجب ضمانت‌اجرای کیفری مقرر در این ماده دانسته است.\r\n\r\nهرچند این ماده به موجب ماده ۶۹۸ قانون آیین دادرسی جرایم نیرو‌های مسلح و دادرسی الکترونیکی مصوب ۱۳۹۳/۰۷/۰۸ منسوخ شده است؛ اما عینا در بند (پ) ماده ۶۶۴ قانون اخیرالذکر، إتیان شده است.\r\n\r\n\r\n', '1.jpg', 'میزان', 4, 6, 13, '4krgtilerhfgikhdfkjbhgkvj', 1),
(7, '2024-07-02 08:52:50', 'آثار طلاق بر کودکان/ زخم‌هایی که تا بزرگسالی هم التیام نمی‌یابند ', 'شقاقی گفت:طلاق والدین می‌تواند بر روان، عاطفه و آینده اقتصادی کودکان اثرات مخربی داشته باشد.', 'لیلا شقاقی روانشناس بالینی کودک و‌نوجوان در گفتگو با باشگاه خبرنگاران جوان اظهار کرد:پدیده طلاق می‌تواند تأثیرات عمیقی بر کودکان داشته باشد، و این تأثیرات ممکن است تا بزرگسالی ادامه یابد. این تأثیرات ممکن است جنبه‌های مختلف زندگی فرد را در برگیرد، از جمله سلامت روان، روابط اجتماعی، و حتی موقعیت اقتصادی.\r\n\r\nسلامت روانی و عاطفی\r\nاو ادامه داد: کودکان طلاق ممکن است بیشتر در معرض اضطراب و افسردگی قرار بگیرند. این حالت می‌تواند به دلیل احساس از دست دادن، بی‌ثباتی و یا نگرانی از آینده باشد.برخی کودکان ممکن است رفتار‌های پرخاشگرانه یا انزوای اجتماعی از خود نشان دهند.\r\n\r\nروابط اجتماعی و خانوادگی\r\nشقاقی تصریح کرد:کودکان طلاق ممکن است در اعتماد به نفس و خودباوری دچار مشکلاتی شوند. رابطه کودکان با والدین به ویژه زمانی که یکی از والدین کمتر در زندگی آنها حضور دارد، ممکن است تحت تأثیر قرار گیرد.\r\n\r\nتحصیلات و موقعیت اقتصادی\r\n\r\nاو گفت:برخی مطالعات نشان می‌دهند که کودکان طلاق در مدرسه ممکن است عملکرد ضعیف‌تری داشته باشند. با کاهش منابع مالی خانواده پس از طلاق، کودکان ممکن است با مشکلات اقتصادی بیشتری مواجه شوند.\r\n\r\nتأثیرات بلندمدت در بزرگسالی\r\nروانشناس بالینی کودک ‌‌نوجوان تصریح کرد: کودکان طلاق در بزرگسالی ممکن است در برقراری و حفظ روابط عاطفی موفق دچار مشکل شوند.برخی تحقیقات نشان داده‌اند که کودکان طلاق ممکن است با چالش‌های بیشتری در محیط کار مواجه شوند.\r\n\r\nنقش دادگاه خانواده\r\nاو گفت: دادگاه‌های خانواده معمولاً تصمیماتی درباره حضانت کودکان می‌گیرند که می‌تواند تأثیر مستقیمی بر رفاه و سلامت کودکان داشته باشد. هدف از این تصمیمات حمایت از منافع عالی کودک است.دادگاه‌ها ممکن است ترتیبات مالی را برای حمایت از کودکان تعیین کنند که شامل نفقه فرزند و هزینه‌های مرتبط با تحصیلات و نیاز‌های روزمره می‌شود.دادگاه‌ها ممکن است خدمات مشاوره‌ای و راهنمایی را برای والدین و کودکان فراهم کنند تا به آنها در عبور از این دوره‌ی دشوار کمک کنند.\r\n\r\nشقاقی تصریح کرد:دریافت مشاوره خانوادگی می‌تواند به کودکان و والدین کمک کند تا بهتر با چالش‌های طلاق کنار بیایند.برنامه‌های حمایت اجتماعی و سازمان‌های غیرانتفاعی می‌توانند منابع و پشتیبانی لازم را برای خانواده‌های دچار طلاق فراهم کنند.\r\n\r\nاو گفت: توجه به نیاز‌های روانی، عاطفی، و مالی کودکان و ارائه حمایت‌های لازم از سوی دادگاه‌ها و سازمان‌های اجتماعی می‌تواند به کاهش این تأثیرات منفی کمک کند و راه را برای آینده‌ای بهتر برای این کودکان هموار سازد.', '9.jpeg', 'خبرنگار عطیه رضایی', 51, 9, 14, 'dfgdjfkhbvjvbjkkjvbkcvvkjbgkjv', 1),
(8, '2024-07-02 12:13:27', 'صادرات ۳۰۰ هزار دلاری محصولات دانش بنیان در خراسان شمالی', 'رییس پارک علم و فناوری خراسان شمالی از صادرات ۳۰۰ هزاردلاری تولیدات شرکت دانش بنیان استان در سه ماه نخست امسال خبرداد.', 'محمد رضا قربانی روند صادرات شرکت‌های دانش‌بنیان درخراسان شمالی را افزایشی دانست و گفت: کالا‌های صادراتی شرکت‌های دانش بنیان شامل انواع مصالح ساختمانی، پودر آلفا آلومینا، فوم و پکیج‌های سرمایشی و گرمایشی بوده که به کشور‌های روسیه، عراق، گرجستان و قزاقستان صادر شد.\r\nوی گفت: پارسال شرکت‌های دانش بنیان استان در مجموع یک میلیون و ۴۱۷ هزارو ۷۶۸ دلار تولیدات خود را صادرکردند.\r\nرییس پارک علم و فناوری استان در خصوص صادرات محصولات شرکت‎های دانش‌بنیان در دولت سیزدهم هم گفت: این شرکت‌ها در دو سال اخیر حدود ۳.۶ میلیون دلار صادرات داشتند که در مقایسه با میزان صادرات در سال ۱۴۰۰ که ۱۸۰ هزار دلار بود از رشد چشمگیری برخوردار بوده است.\r\n۱۳۵ واحد فناور ۱۳۶ شرکت دانش بنیان در خراسان شمالی وجود دارد که حدود ۱۲۵ شرکت فعال هستند.', '3.jpg', 'http://www.yjc.ir/00an4i', 17, 6, 1, 'njkcbvjhbjcvbjbcjbcbc', 1),
(9, '2024-07-05 13:27:16', 'dfghfmnbj', 'vvvvvvvvvvvvvvvvv', 'vvvvvvvvvvvvvv', '2.jpg', 'retgrft', 11, 18, 2, 'fhhhhhhhhhhhhhhhhhhhh', 1),
(11, '2024-07-05 13:28:26', 'ttttttttttttttttttttttttttttttttttt', 'fffffffhhhhhhhh', 'jjjjjjjjjjjjjjj', '3.jpg', 'ytyyyr.ir', 12, 13, 14, 'fhhhhhhhhhhhh', 1),
(17, '2024-07-09 08:52:46', 'vghftgh', 'hhhhhhhhhf', 'fgfgfgfgfgfgfgfgfgfgfgfgh', '1.jpg', 'gfdrtg', 3, 16, 2, 'gfn', 1),
(18, '2024-07-09 09:04:35', 'grfe', 'errrrrrrrrrrrrrrrrrrr', 'gggggggggggr', '3.jpg', 're', 1, 18, 1, 'f2nmp%6%Rx^9^rw4', 1),
(19, '2024-07-14 08:33:46', 'خبر۱ ', 'اتدلاتپدلادبل', 'ابلزتلا', 'img105.jpg', 'بل', 2, 12, 13, 'tQ0xGOz*fyX@1Pa', 1),
(25, '2024-07-14 10:25:05', 'خبر۱', 'fg nbv', 'fnb ', 'img101.jpg', 'hgfb', 5, 11, 1, 'eGk_FWDBCmJb$E', 1),
(39, '2024-07-20 09:02:40', 'kkkkkkuyyum', 'ifuoliuoyi', 'llgkulguluuiuii', 'img21.jpg', 'fvuil.iu', 8, 12, 13, '8o*Tu3h@OBsA4X', 1),
<<<<<<< HEAD
<<<<<<< HEAD
(44, '2024-07-30 08:40:54', 'bgb', 'b', 'b', 'default_art_img.png', 'b', NULL, 12, 13, 'pDxhMjq2kOF5IgZi', 1),
(45, '2024-07-30 12:42:58', 'nbn', 'nnn', 'nnn', 'default_art_img.png', 'nnn', NULL, 13, 13, '72urE0cmihjpHoTU', 1),
(46, '2024-07-30 12:49:42', 'ytrfyt', 'fdxgfdgfx', 'gfdgfdfdfhdggggggggggggggg', '3.jpg', 'hgf', NULL, 6, 13, 'ulwcN8OeoBKIHMUY', 1);
=======
(44, '2024-07-30 08:40:54', 'bgb', 'b', 'b', 'default_art_img.png', 'b', 0, 12, 13, 'pDxhMjq2kOF5IgZi', 1),
(45, '2024-07-30 12:42:58', 'nbn', 'nnn', 'nnn', 'default_art_img.png', 'nnn', 0, 13, 13, '72urE0cmihjpHoTU', 1),
(46, '2024-07-30 12:49:42', 'ytrfyt', 'fdxgfdgfx', 'gfdgfdfdfhdggggggggggggggg', '3.jpg', 'hgf', 0, 6, 13, 'ulwcN8OeoBKIHMUY', 1);
>>>>>>> ccb84342f5e2d3160d997b6013b7247ad6100933
=======
(44, '2024-07-30 08:40:54', 'bgb', 'b', 'b', 'default_art_img.png', 'b', 0, 12, 13, 'pDxhMjq2kOF5IgZi', 1),
(45, '2024-07-30 12:42:58', 'nbn', 'nnn', 'nnn', 'default_art_img.png', 'nnn', 0, 13, 13, '72urE0cmihjpHoTU', 1),
(46, '2024-07-30 12:49:42', 'ytrfyt', 'fdxgfdgfx', 'gfdgfdfdfhdggggggggggggggg', '3.jpg', 'hgf', 0, 6, 13, 'ulwcN8OeoBKIHMUY', 1);
>>>>>>> ccb84342f5e2d3160d997b6013b7247ad6100933

-- --------------------------------------------------------

--
-- Table structure for table `article_tag`
--

DROP TABLE IF EXISTS `article_tag`;
CREATE TABLE IF NOT EXISTS `article_tag` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `article_id` bigint UNSIGNED NOT NULL,
  `tag_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `article_id` (`article_id`,`tag_id`),
  KEY `tag_id` (`tag_id`),
  KEY `tag_id_2` (`tag_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_persian_ci;

--
-- Dumping data for table `article_tag`
--

INSERT INTO `article_tag` (`id`, `article_id`, `tag_id`) VALUES
(17, 2, 19),
(18, 2, 20),
(11, 7, 19),
(16, 9, 18),
(15, 18, 19),
(13, 25, 19),
(19, 44, 5),
(20, 45, 5);

-- --------------------------------------------------------

--
-- Table structure for table `categorys`
--

DROP TABLE IF EXISTS `categorys`;
CREATE TABLE IF NOT EXISTS `categorys` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(500) COLLATE utf8mb3_persian_ci NOT NULL,
  `parent_id` bigint UNSIGNED DEFAULT '0',
  `slug` varchar(1000) COLLATE utf8mb3_persian_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_persian_ci;

--
-- Dumping data for table `categorys`
--

INSERT INTO `categorys` (`id`, `title`, `parent_id`, `slug`) VALUES
(1, 'مجلس', 0, 'jsdggggggggggggggggg\r\n'),
(2, 'فرهنگی', 0, 'tgldbhlkdfhglkhfgln'),
(3, 'سیاسی', 0, ' sjvfjkhbikjhkgbjhgd'),
(4, 'اقتصادی', 0, 'gjhhhhhhh'),
(5, 'ورزشی', 0, 'juygdfjvhgsdjkm'),
(6, 'والیبال', 5, 'kgfvidfjgfvigfgfg'),
(7, 'فوتبال', 5, 'jfsdgvsjsdj'),
(9, 'جامعه', 2, 'hgbkcfhvgbkfhnkjchnkj'),
(10, 'استان ها', 0, 'fgoiuycfio'),
(11, 'فارس', 10, 'njgfibhkbjgolblkv'),
(12, 'گیلان', 10, 'lnjgkfhgjnvkjbhn'),
(13, 'تهران', 10, 'trfghluivbgvkbjn\r\n'),
(15, 'خبرگان', 1, 'dfbj'),
(16, 'مسابقات', 2, 'gffffffffff'),
(17, 'ارز', 4, 'jjj'),
(18, 'انتخابات', 3, 'rfgbbbbbrdf');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb3_persian_ci NOT NULL,
  `email` varchar(500) COLLATE utf8mb3_persian_ci NOT NULL,
  `comment` text COLLATE utf8mb3_persian_ci NOT NULL,
  `date` date NOT NULL,
  `article_id` bigint UNSIGNED NOT NULL,
  `venify` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `article_id` (`article_id`),
  KEY `article_id_2` (`article_id`),
  KEY `article_id_3` (`article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_persian_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `comment`, `date`, `article_id`, `venify`) VALUES
(6, 'بهرام', 'b@gmail.com', 'این خبر درست نیست', '2024-07-18', 7, 1),
(8, 'dara', 'dd@gmail.com', 'سلام', '2024-07-30', 5, 1),
(9, 'تابلت', 'ff@gmail.com', 'خبر نایس', '2024-07-13', 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
CREATE TABLE IF NOT EXISTS `setting` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `key_setting` varchar(500) COLLATE utf8mb3_persian_ci NOT NULL,
  `value_setting` varchar(500) COLLATE utf8mb3_persian_ci NOT NULL,
  `link` text COLLATE utf8mb3_persian_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key_setting` (`key_setting`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_persian_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `key_setting`, `value_setting`, `link`) VALUES
(1, 'Advertise_header', '2.gif', ''),
(2, 'Advertise_middel1', '1.gif', ''),
(3, 'Advertise_middel2', '4.gif', ''),
(4, 'Advertise_left1', '5.gif', ''),
(5, 'Advertise_left2', 'powerdeby.png', ''),
(6, 'Advertise_left3', '5577072.gif', ''),
(7, 'logo_header', 'logo.png', ''),
(8, 'Advertise_right1', '6.gif', ''),
(9, 'Advertise_right2', '7.gif', ''),
(10, 'Advertise_right3', '6.jpeg', ''),
(11, 'Advertise_left4', '5577072.gif', ''),
(12, 'instagram_icon', '', 'https://www.instagram.com'),
(13, 'telegram_icon', '', 'https://www.telegram.com'),
(14, 'twitter_icon', '', 'https://www.twitter.com'),
(15, 'facebook_icon', '', 'https://www.facebook.com'),
(16, 'title', 'خبر اینلاین', NULL),
<<<<<<< HEAD
<<<<<<< HEAD
(17, 'footer', 'اسرز', 'https://asrez.com/');
=======
(17, 'footer', 'asrez', 'https://asrez.com/');
>>>>>>> ccb84342f5e2d3160d997b6013b7247ad6100933
=======
(17, 'footer', 'asrez', 'https://asrez.com/');
>>>>>>> ccb84342f5e2d3160d997b6013b7247ad6100933

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(500) COLLATE utf8mb3_persian_ci NOT NULL,
  `slug` varchar(1000) COLLATE utf8mb3_persian_ci NOT NULL,
  PRIMARY KEY (`slug`) USING BTREE,
  UNIQUE KEY `slug` (`slug`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_persian_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `title`, `slug`) VALUES
(18, 'اقتصادی', '8dRAme6)z#GO%rX5'),
(5, 'سیاسی', 'h%#D9^m*sc$8&AHX'),
(19, 'اجتماعی', 'kZNVg%2djicoI$QD'),
(20, 'خبر اینلاین', 'ShkQ8E@xJ1(e*Gyf');

-- --------------------------------------------------------

--
-- Table structure for table `view`
--

DROP TABLE IF EXISTS `view`;
CREATE TABLE IF NOT EXISTS `view` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `user_ip` varchar(5000) COLLATE utf8mb3_persian_ci NOT NULL,
  `article_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `article_id` (`article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_persian_ci;

--
-- Dumping data for table `view`
--

INSERT INTO `view` (`id`, `user_ip`, `article_id`) VALUES
(1, '127.0.0.1', 3),
(2, '127.0.0.1', 39),
(3, '127.0.0.1', 25),
(4, '127.0.0.1', 4),
(5, '127.0.0.1', 19),
(6, '127.0.0.1', 2),
(7, '127.0.0.1', 11),
(8, '127.0.0.1', 1);
<<<<<<< HEAD
<<<<<<< HEAD

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `id` (`id`,`username`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `id_2` (`id`),
  ADD KEY `id_3` (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `category_id` (`admin_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `id` (`id`),
  ADD KEY `category_id_2` (`category_id`);

--
-- Indexes for table `article_tag`
--
ALTER TABLE `article_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`,`tag_id`),
  ADD KEY `tag_id` (`tag_id`),
  ADD KEY `tag_id_2` (`tag_id`);

--
-- Indexes for table `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`),
  ADD KEY `article_id_2` (`article_id`),
  ADD KEY `article_id_3` (`article_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `key_setting` (`key_setting`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`slug`) USING BTREE,
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `view`
--
ALTER TABLE `view`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `article_tag`
--
ALTER TABLE `article_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `view`
--
ALTER TABLE `view`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
=======
>>>>>>> ccb84342f5e2d3160d997b6013b7247ad6100933
=======
>>>>>>> ccb84342f5e2d3160d997b6013b7247ad6100933

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categorys` (`id`);

--
-- Constraints for table `article_tag`
--
ALTER TABLE `article_tag`
  ADD CONSTRAINT `article_tag_ibfk_2` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`),
  ADD CONSTRAINT `article_tag_ibfk_3` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`);

--
-- Constraints for table `view`
--
ALTER TABLE `view`
  ADD CONSTRAINT `view_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
