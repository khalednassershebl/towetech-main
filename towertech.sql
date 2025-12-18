-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2025 at 01:07 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `towertech`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subtitle_ar` varchar(255) DEFAULT NULL,
  `subtitle_en` varchar(255) DEFAULT NULL,
  `title_ar` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `experience_years` int(11) NOT NULL DEFAULT 0,
  `experience_image` varchar(255) DEFAULT NULL,
  `experience_description_ar` text DEFAULT NULL,
  `experience_description_en` text DEFAULT NULL,
  `content_ar` text NOT NULL,
  `content_en` text NOT NULL,
  `features_ar` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`features_ar`)),
  `features_en` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`features_en`)),
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `subtitle_ar`, `subtitle_en`, `title_ar`, `title_en`, `experience_years`, `experience_image`, `experience_description_ar`, `experience_description_en`, `content_ar`, `content_en`, `features_ar`, `features_en`, `image`, `created_at`, `updated_at`) VALUES
(1, 'عن الشركة', 'About Us', 'شركة رائدة في قطاعات البناء وتقنية المعلومات', 'Leading Company in Construction and IT Sectors', 19, 'abouts/Q3pP2K7YwXM2jTicM5fHA9GnNM8df1NAqCRSLAXz.png', 'عام من الخبرة في تقديم حلول متكاملة في مجالات المقاولات والبنية التحتية وتقنية المعلومات والأنظمة منخفضة الجهد والاتصالات. خبرة واسعة في تنفيذ المشاريع الكبرى في المملكة العربية السعودية.', 'Years of experience in providing integrated solutions in the fields of construction, infrastructure, information technology, low-voltage systems, and communications. Extensive experience in implementing major projects in Saudi Arabia.', 'نحن شركة متخصصة في المملكة العربية السعودية تعمل في مجالات المقاولات والبنية التحتية وتقنية المعلومات والأنظمة منخفضة الجهد والاتصالات. نقدم حلولاً شاملة ومتكاملة تغطي جميع احتياجات المشاريع الكبرى في المملكة. من خلال فريقنا الخبير وأحدث التقنيات، نساهم في بناء البنية التحتية الحديثة وتطوير المشاريع التقنية والاتصالات التي تدعم رؤية المملكة 2030. نلتزم بأعلى معايير الجودة والسلامة في جميع مشاريعنا، ونوفر خدمات متكاملة من التصميم والتنفيذ إلى الصيانة والدعم الفني.', 'We are a specialized company in Saudi Arabia working in the fields of construction, infrastructure, information technology, low-voltage systems, and communications. We provide comprehensive and integrated solutions covering all the needs of major projects in the Kingdom. Through our expert team and latest technologies, we contribute to building modern infrastructure and developing technical and communication projects that support Vision 2030. We are committed to the highest standards of quality and safety in all our projects, and provide integrated services from design and implementation to maintenance and technical support.', '[\"\\u062d\\u0644\\u0648\\u0644 \\u0645\\u062a\\u0643\\u0627\\u0645\\u0644\\u0629\",\"\\u062c\\u0648\\u062f\\u0629 \\u0639\\u0627\\u0644\\u064a\\u0629\",\"\\u062f\\u0639\\u0645 \\u0641\\u0646\\u064a \\u0645\\u0633\\u062a\\u0645\\u0631\",\"\\u062e\\u0628\\u0631\\u0629 \\u0648\\u0627\\u0633\\u0639\\u0629\"]', '[\"Integrated Solutions\",\"High Quality\",\"Continuous Technical Support\",\"Extensive Experience\"]', NULL, '2025-12-16 13:11:00', '2025-12-18 08:06:57');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `category_ar` varchar(255) NOT NULL,
  `category_en` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `published_at` date NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title_ar`, `title_en`, `category_ar`, `category_en`, `image`, `published_at`, `link`, `order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'كيفية اختيار شركة مقاولات في المملكة العربية السعودية — ما يجب التحقق منه قبل التوقيع', 'كيفية اختيار شركة مقاولات في المملكة العربية السعودية — ما يجب التحقق منه قبل التوقيع', 'تعليمي', 'تعليمي', 'blogs/X2NBVoHvpwttVoOgqkQk7nQqzCyxd5Pcol6YU3V0.jpg', '2025-12-16', 'https://www.test.com', 0, 1, '2025-12-16 14:31:50', '2025-12-18 08:10:15');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hero_slides`
--

CREATE TABLE `hero_slides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `background_image` varchar(255) DEFAULT NULL,
  `title_ar` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `subtitle_ar` text DEFAULT NULL,
  `subtitle_en` text DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hero_slides`
--

INSERT INTO `hero_slides` (`id`, `background_image`, `title_ar`, `title_en`, `subtitle_ar`, `subtitle_en`, `link`, `order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'hero-slides/il59uHRc90MBn2JZdJ4CdHTX3kvWH1lhg4GrVvSW.png', 'نلتزم بأعلى معايير الجودة والسلامة', 'نلتزم بأعلى معايير الجودة والسلامة', 'نوفر خدمات متكاملة من التصميم والتنفيذ إلى الصيانة والدعم الفني لدعم رؤية المملكة 2030', 'نوفر خدمات متكاملة من التصميم والتنفيذ إلى الصيانة والدعم الفني لدعم رؤية المملكة 2030', '/services', 0, 1, '2025-12-16 13:24:56', '2025-12-18 08:07:36'),
(2, 'hero-slides/1OvVoNvBp5stufTp2U5VfGdraqzFDbTMMhpm1h5n.png', 'حلول متكاملة لمشاريع المستقبل', 'حلول متكاملة لمشاريع المستقبل', 'نقدم حلولاً شاملة ومتكاملة تغطي جميع احتياجات المشاريع الكبرى في المملكة من خلال فريقنا الخبير وأحدث التقنيات', 'نقدم حلولاً شاملة ومتكاملة تغطي جميع احتياجات المشاريع الكبرى في المملكة من خلال فريقنا الخبير وأحدث التقنيات', '/services', 1, 1, '2025-12-16 13:25:52', '2025-12-18 08:07:27'),
(3, 'hero-slides/TYXAQCBSFfHgBcxCetwX8pHZZFYdgLzbA57qXhcD.png', 'بناء المستقبل. الجودة أولاً. التميز دائماً', 'بناء المستقبل. الجودة أولاً. التميز دائماً', 'شركة رائدة في المملكة العربية السعودية متخصصة في المقاولات والبنية التحتية وتقنية المعلومات والأنظمة منخفضة الجهد', 'شركة رائدة في المملكة العربية السعودية متخصصة في المقاولات والبنية التحتية وتقنية المعلومات والأنظمة منخفضة الجهد', '/services', 2, 1, '2025-12-16 13:26:30', '2025-12-18 08:07:20');

-- --------------------------------------------------------

--
-- Table structure for table `index_section_headers`
--

CREATE TABLE `index_section_headers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_type` varchar(255) NOT NULL DEFAULT 'services',
  `title_ar` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `subtitle_ar` varchar(255) DEFAULT NULL,
  `subtitle_en` varchar(255) DEFAULT NULL,
  `description_ar` text DEFAULT NULL,
  `description_en` text DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `index_section_headers`
--

INSERT INTO `index_section_headers` (`id`, `section_type`, `title_ar`, `title_en`, `subtitle_ar`, `subtitle_en`, `description_ar`, `description_en`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'services', 'خـــدمـــات مـــتـــكـــامـــلــــة فـــريـــق خـــبـــيـــر واحـــد.', 'خـــدمـــات مـــتـــكـــامـــلــــة فـــريـــق خـــبـــيـــر واحـــد.', 'خدماتنا', 'خدماتنا', 'كشركة رائدة في المملكة العربية السعودية، نخطط وننتج ونحسّن كل مرحلة - من الوعي والاكتساب إلى الاحتفاظ - مدعومة بالبيانات والهندسة والتقارير الواضحة.', 'كشركة رائدة في المملكة العربية السعودية، نخطط وننتج ونحسّن كل مرحلة - من الوعي والاكتساب إلى الاحتفاظ - مدعومة بالبيانات والهندسة والتقارير الواضحة.', 1, '2025-12-16 14:03:01', '2025-12-16 14:06:09'),
(2, 'testimonials', 'مــاذا يــقـــول عــمـــلاؤنـــا عـــن الـــعـــمـــل مـــعـــنــــا', 'مــاذا يــقـــول عــمـــلاؤنـــا عـــن الـــعـــمـــل مـــعـــنــــا', 'آراء عملائنا', 'آراء عملائنا', 'نفتخر بثقة عملائنا ورضاهم عن خدماتنا. اكتشف ما يقوله عملاؤنا عن تجربتهم معنا.', 'نفتخر بثقة عملائنا ورضاهم عن خدماتنا. اكتشف ما يقوله عملاؤنا عن تجربتهم معنا.', 1, '2025-12-16 14:21:02', '2025-12-16 14:21:02'),
(3, 'blog', 'أخـــبـــار ورؤى مـــن عـــالـــم الـــمـــقـــاولات والــتـــقــنــيــة', 'أخـــبـــار ورؤى مـــن عـــالـــم الـــمـــقـــاولات والــتـــقــنــيــة', 'المدونة', 'المدونة', 'اكتشف آخر الأخبار والمقالات المتخصصة في مجالات المقاولات والبنية التحتية وتقنية المعلومات والأنظمة منخفضة الجهد.', 'اكتشف آخر الأخبار والمقالات المتخصصة في مجالات المقاولات والبنية التحتية وتقنية المعلومات والأنظمة منخفضة الجهد.', 1, '2025-12-18 08:15:55', '2025-12-18 08:16:17');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_12_16_124303_create_sliders_table', 1),
(6, '2025_12_16_144653_create_partners_table', 2),
(7, '2025_12_16_150000_create_abouts_table', 3),
(8, '2025_12_17_000000_create_hero_slides_table', 4),
(9, '2025_12_17_100000_create_services_table', 5),
(10, '2025_12_17_110000_create_index_section_headers_table', 6),
(11, '2025_12_18_000000_create_testimonials_table', 7),
(12, '2025_12_18_100000_add_section_type_to_index_section_headers_table', 8),
(13, '2025_12_18_200000_create_blogs_table', 9),
(14, '2025_12_18_102157_create_settings_table', 10),
(15, '2025_12_18_111221_add_image_to_users_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `name_ar`, `name_en`, `logo`, `created_at`, `updated_at`) VALUES
(1, '1', '1', 'partners/gyUlJJEds0K0qQb6RRESX2VkRQdYtMfmuyE5xei7.webp', '2025-12-16 12:50:39', '2025-12-18 08:05:32'),
(2, '2', '2', 'partners/ko1xAuUoYFXkLOwENBGHp7ztlIakPSU27Yth1AOT.webp', '2025-12-16 12:50:50', '2025-12-18 08:05:41'),
(3, '3', '3', 'partners/4b98aIQI1QFrZyqiluhjrG2IyXG7J1ZlEH82jHgu.webp', '2025-12-16 12:51:03', '2025-12-18 08:05:53'),
(4, '4', '4', 'partners/KJKme84kWCc8fYU2I3PIalfUKHPItqASEnRMDj47.webp', '2025-12-16 12:51:19', '2025-12-18 08:06:01'),
(5, '5', '5', 'partners/VILyoKDuGWq2nIScVCReZjQezknih677YtsIv8BV.webp', '2025-12-16 12:51:28', '2025-12-18 08:06:09'),
(6, '6', '6', 'partners/5fODQNLwwROlR7Evcp65JI5vPnQcwccBdZeKkv9Q.webp', '2025-12-16 12:51:38', '2025-12-18 08:06:18'),
(7, '7', '7', 'partners/xw99S9rjBODz3RlOUlEo1lUAbpXS3zKpYP8ofEnj.webp', '2025-12-16 12:51:46', '2025-12-18 08:06:25'),
(8, '8', '8', 'partners/ajtoxmNrf6WExmar71SOrJ5CE9mxYj9w0BxfpKLf.webp', '2025-12-16 12:51:55', '2025-12-18 08:06:33');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `description_ar` text NOT NULL,
  `description_en` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title_ar`, `title_en`, `description_ar`, `description_en`, `image`, `link`, `order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'المقاولات', 'المقاولات', 'نقدم خدمات المقاولات الشاملة للمشاريع الكبرى في المملكة العربية السعودية من التصميم والتنفيذ إلى التسليم النهائي. نلتزم بأعلى معايير الجودة والسلامة وفقاً للمواصفات السعودية والدولية.', 'نقدم خدمات المقاولات الشاملة للمشاريع الكبرى في المملكة العربية السعودية من التصميم والتنفيذ إلى التسليم النهائي. نلتزم بأعلى معايير الجودة والسلامة وفقاً للمواصفات السعودية والدولية.', 'services/ufaDgtOnrU9agzXtlCjbFEdGZPiLT3tEgYbIejIo.jpg', 'https://www.test.com', 0, 1, '2025-12-16 13:38:40', '2025-12-18 08:09:01'),
(2, 'البنية التحتية', 'البنية التحتية', 'تطوير وتنفيذ مشاريع البنية التحتية المتكاملة من الطرق والجسور والأنفاق إلى شبكات المياه والصرف الصحي. نعمل على بناء البنية التحتية الحديثة التي تدعم رؤية المملكة 2030.', 'تطوير وتنفيذ مشاريع البنية التحتية المتكاملة من الطرق والجسور والأنفاق إلى شبكات المياه والصرف الصحي. نعمل على بناء البنية التحتية الحديثة التي تدعم رؤية المملكة 2030.', 'services/f9mnb4coEZANKcuRbiotJPJKNAXqwWkgOGQSpDQd.jpg', 'https://www.test.com', 0, 1, '2025-12-16 13:59:19', '2025-12-18 08:09:15'),
(3, 'تقنية المعلومات', 'تقنية المعلومات', 'حلول تقنية المعلومات المتكاملة من أنظمة إدارة المشاريع إلى البنية التحتية السحابية والأمن السيبراني. نقدم خدمات التطوير والصيانة والدعم الفني للمؤسسات في المملكة العربية السعودية.', 'حلول تقنية المعلومات المتكاملة من أنظمة إدارة المشاريع إلى البنية التحتية السحابية والأمن السيبراني. نقدم خدمات التطوير والصيانة والدعم الفني للمؤسسات في المملكة العربية السعودية.', 'services/BQCAb2KAaAiSOOWjRz1H9wqy2UyTZq38rKbXhBaz.jpg', 'https://www.test.com', 0, 1, '2025-12-16 14:00:03', '2025-12-18 08:09:23'),
(4, 'التيار الخفيف', 'التيار الخفيف', 'حلول تقنية المعلومات المتكاملة من أنظمة إدارة المشاريع إلى البنية التحتية السحابية والأمن السيبراني. نقدم خدمات التطوير والصيانة والدعم الفني للمؤسسات في المملكة العربية السعودية.', 'حلول تقنية المعلومات المتكاملة من أنظمة إدارة المشاريع إلى البنية التحتية السحابية والأمن السيبراني. نقدم خدمات التطوير والصيانة والدعم الفني للمؤسسات في المملكة العربية السعودية.', 'services/qpd7CvJpMKOCS5JjQmUfufVv4WZz82IBONbj3bUw.jpg', 'https://www.test.com', 0, 1, '2025-12-16 14:00:35', '2025-12-18 08:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'text',
  `group` varchar(255) DEFAULT NULL,
  `label_ar` text DEFAULT NULL,
  `label_en` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `type`, `group`, `label_ar`, `label_en`, `created_at`, `updated_at`) VALUES
(1, 'social_facebook', 'https://facebook.com', 'text', 'social_media', 'فيسبوك', 'Facebook', '2025-12-18 08:33:16', '2025-12-18 08:33:16'),
(2, 'social_twitter', 'https://x.com', 'text', 'social_media', 'تويتر', 'Twitter', '2025-12-18 08:33:16', '2025-12-18 08:33:40'),
(3, 'social_instagram', 'https://insta.com', 'text', 'social_media', 'إنستغرام', 'Instagram', '2025-12-18 08:33:16', '2025-12-18 08:33:40'),
(4, 'social_linkedin', 'https://linkedin.com', 'text', 'social_media', 'لينكد إن', 'LinkedIn', '2025-12-18 08:33:16', '2025-12-18 08:33:40'),
(5, 'social_youtube', 'https://youtube.com', 'text', 'social_media', 'يوتيوب', 'YouTube', '2025-12-18 08:33:16', '2025-12-18 08:33:40'),
(6, 'footer_service_links', '[{\"title_ar\":\"\\u062e\\u062f\\u0645\\u0629 1\",\"title_en\":\"\\u062e\\u062f\\u0645\\u0629 1\",\"link\":\"https:\\/\\/ser1.com\"},{\"title_ar\":\"\\u062e\\u062f\\u0645\\u0629 2\",\"title_en\":\"\\u062e\\u062f\\u0645\\u0629 2\",\"link\":\"https:\\/\\/ser2.com\"}]', 'json', 'footer', 'روابط الخدمات في التذييل', 'Service Links in Footer', '2025-12-18 08:33:16', '2025-12-18 08:34:38'),
(7, 'footer_about_ar', 'شركة رائدة في المملكة العربية السعودية متخصصة في المقاولات والبنية التحتية وتقنية المعلومات والأنظمة منخفضة الجهد والاتصالات.', 'text', 'footer', 'نبذة عن الشركة (عربي)', 'About Company (Arabic)', '2025-12-18 08:33:16', '2025-12-18 08:35:51'),
(8, 'footer_about_en', 'شركة رائدة في المملكة العربية السعودية متخصصة في المقاولات والبنية التحتية وتقنية المعلومات والأنظمة منخفضة الجهد والاتصالات.', 'text', 'footer', 'نبذة عن الشركة (إنجليزي)', 'About Company (English)', '2025-12-18 08:33:16', '2025-12-18 08:35:51'),
(9, 'seo_meta_title_ar', 'تاور تيك', 'text', 'seo', 'عنوان الميتا (عربي)', 'Meta Title (Arabic)', '2025-12-18 08:33:16', '2025-12-18 08:36:43'),
(10, 'seo_meta_title_en', 'Towe Tech', 'text', 'seo', 'عنوان الميتا (إنجليزي)', 'Meta Title (English)', '2025-12-18 08:33:16', '2025-12-18 08:36:43'),
(11, 'seo_meta_description_ar', 'شركة رائدة في المملكة العربية السعودية متخصصة في المقاولات والبنية التحتية وتقنية المعلومات والأنظمة منخفضة الجهد والاتصالات.', 'text', 'seo', 'وصف الميتا (عربي)', 'Meta Description (Arabic)', '2025-12-18 08:33:16', '2025-12-18 08:36:43'),
(12, 'seo_meta_description_en', 'شركة رائدة في المملكة العربية السعودية متخصصة في المقاولات والبنية التحتية وتقنية المعلومات والأنظمة منخفضة الجهد والاتصالات.', 'text', 'seo', 'وصف الميتا (إنجليزي)', 'Meta Description (English)', '2025-12-18 08:33:16', '2025-12-18 08:36:43'),
(13, 'seo_meta_keywords_ar', 'Towe ,Tech', 'text', 'seo', 'كلمات مفتاحية (عربي)', 'Meta Keywords (Arabic)', '2025-12-18 08:33:16', '2025-12-18 08:36:43'),
(14, 'seo_meta_keywords_en', 'Towe ,Tech', 'text', 'seo', 'كلمات مفتاحية (إنجليزي)', 'Meta Keywords (English)', '2025-12-18 08:33:16', '2025-12-18 08:36:43'),
(15, 'footer_email', 'info@towetech.com', 'text', 'contact', 'البريد الإلكتروني', 'Email', '2025-12-18 08:33:16', '2025-12-18 08:37:12'),
(16, 'footer_phone', '01007056732', 'text', 'contact', 'رقم الهاتف', 'Phone', '2025-12-18 08:33:16', '2025-12-18 08:37:12'),
(17, 'whatsapp_number', '01007056732', 'text', 'contact', 'رقم واتساب', 'WhatsApp Number', '2025-12-18 08:33:16', '2025-12-18 08:37:12'),
(18, 'contact_us_button_text_ar', 'اتصل بنا', 'text', 'contact', 'نص زر اتصل بنا (عربي)', 'Contact Us Button Text (Arabic)', '2025-12-18 08:33:16', '2025-12-18 08:33:16'),
(19, 'contact_us_button_text_en', 'Contact Us', 'text', 'contact', 'نص زر اتصل بنا (إنجليزي)', 'Contact Us Button Text (English)', '2025-12-18 08:33:16', '2025-12-18 08:33:16'),
(20, 'footer_location_ar', 'المملكة العربية السعودية', 'text', 'footer', 'الموقع (عربي)', 'Location (Arabic)', '2025-12-18 08:33:16', '2025-12-18 08:37:50'),
(21, 'footer_location_en', 'المملكة العربية السعودية', 'text', 'footer', 'الموقع (إنجليزي)', 'Location (English)', '2025-12-18 08:33:16', '2025-12-18 08:37:50'),
(22, 'privacy_policy_link', 'https://privacy.com', 'text', 'legal', 'رابط سياسة الخصوصية', 'Privacy Policy Link', '2025-12-18 08:33:16', '2025-12-18 08:38:32'),
(23, 'terms_conditions_link', 'https://terms.com', 'text', 'legal', 'رابط الشروط والأحكام', 'Terms & Conditions Link', '2025-12-18 08:33:16', '2025-12-18 08:38:32'),
(24, 'navbar_logo', 'settings/bEiXEp36IoJI4revsnvYmhKLwaJYp5Z0jcCfXAHu.png', 'file', 'logos', 'شعار شريط التنقل', 'Navbar Logo', '2025-12-18 08:35:19', '2025-12-18 08:35:19'),
(25, 'footer_logo', 'settings/CucRGshGF0TyIZERlx6urBN9dRvpxAVLBmzSbyAC.png', 'file', 'logos', 'شعار التذييل', 'Footer Logo', '2025-12-18 08:35:19', '2025-12-18 08:35:19'),
(26, 'favicon', 'settings/L4Jwq7RXUri1TYVWr01Mu0GLLZEN5Y7Bl77dGU03.png', 'file', 'logos', 'أيقونة الموقع', 'Favicon', '2025-12-18 08:35:19', '2025-12-18 08:35:19'),
(27, 'footer_location_link', 'https://www.google.com/maps?q=30.0119767,31.2967588', 'text', 'footer', 'رابط الموقع', 'Location Link', '2025-12-18 08:42:47', '2025-12-18 08:42:47'),
(28, 'default_language', 'en', 'text', 'general', 'اللغة الافتراضية', 'Default Language', '2025-12-18 09:37:23', '2025-12-18 09:37:42');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `background` varchar(255) DEFAULT NULL,
  `title_ar` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `description_ar` text DEFAULT NULL,
  `description_en` text DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `background`, `title_ar`, `title_en`, `description_ar`, `description_en`, `link`, `created_at`, `updated_at`) VALUES
(2, 'sliders/Gg3LVrWFFCoF7tzHztfPnhTkxMhh0PBhckJ5LFeH.png', 'بـنـاء الـمـسـتـقبل. الـــــجـــــــودة أولاً. الــتــمــيــز دائــمــاً.', 'Building the future. Quality first. Excellence always.', 'شركة رائدة في المملكة العربية السعودية متخصصة في المقاولات والبنية التحتية وتقنية المعلومات والأنظمة منخفضة الجهد والاتصالات. نقدم حلولاً شاملة ومتكاملة لبناء المستقبل الرقمي والبنية التحتية الحديثة في المملكة.', 'A leading company in Saudi Arabia specializing in contracting, infrastructure, information technology, low-voltage systems, and communications. We offer comprehensive and integrated solutions for building the Kingdom\'s digital future and modern infrastructure.', 'https://www.test.com', '2025-12-16 11:56:43', '2025-12-18 09:34:21');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `position_ar` varchar(255) NOT NULL,
  `position_en` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `rating` int(11) NOT NULL DEFAULT 5,
  `review_ar` text NOT NULL,
  `review_en` text NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name_ar`, `name_en`, `position_ar`, `position_en`, `image`, `rating`, `review_ar`, `review_en`, `order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'أحمد محمد', 'أحمد محمد', 'مدير مشروع', 'مدير مشروع', 'testimonials/FB0Ha61rq3F3kP3o7LkMxaxIipeD8sBwiponYXWa.jpg', 4, 'تجربة رائعة مع فريق العمل. لقد قدموا خدمات عالية الجودة في مجال المقاولات والبنية التحتية. التنفيذ كان في الوقت المحدد والجودة ممتازة. أنصح بالتعامل معهم.', 'تجربة رائعة مع فريق العمل. لقد قدموا خدمات عالية الجودة في مجال المقاولات والبنية التحتية. التنفيذ كان في الوقت المحدد والجودة ممتازة. أنصح بالتعامل معهم.', 0, 1, '2025-12-16 14:15:37', '2025-12-18 08:10:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'خالد شبل', 'admin@admin.com', 'users/KRscj2aCO8iScxxQwSSYgKhPGsf3RsHuv3VLyqnt.png', '2025-12-16 10:49:35', '$2a$12$pA7nvjOiG1xlpgo19y7UnO/7OPt9xvCf2cYPFoorQXWXDlLs/AehG', '90CBW9LYJUvnHRxJcrNSjEIWjFgF2yZ8CNhqOPz9CrmlSpLkqOA0t0mT8vPB', '2025-12-16 10:49:35', '2025-12-18 09:16:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hero_slides`
--
ALTER TABLE `hero_slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `index_section_headers`
--
ALTER TABLE `index_section_headers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hero_slides`
--
ALTER TABLE `hero_slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `index_section_headers`
--
ALTER TABLE `index_section_headers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
