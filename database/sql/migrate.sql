
create table `users` (`id` bigint unsigned not null auto_increment primary key, `name` varchar(191) not null, `email` varchar(191) not null, `email_verified_at` timestamp null, `password` varchar(191) not null, `role` varchar(191) not null, `status` tinyint(1) not null default '1', `remember_token` varchar(100) null, `created_at` timestamp null, `updated_at` timestamp null, `deleted_at` timestamp null, `created_by` int null, `updated_by` int null, `deleted_by` int null) default character set utf8mb4 collate 'utf8mb4_unicode_ci';

alter table `users` add unique `users_email_unique`(`email`);

create table `password_resets` (`email` varchar(191) not null, `token` varchar(191) not null, `created_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci';

alter table `password_resets` add index `password_resets_email_index`(`email`);

create table `failed_jobs` (`id` bigint unsigned not null auto_increment primary key, `connection` text not null, `queue` text not null, `payload` longtext not null, `exception` longtext not null, `failed_at` timestamp default CURRENT_TIMESTAMP not null) default character set utf8mb4 collate 'utf8mb4_unicode_ci'
CreateOfferClaimsTable: create table `offer_claims` (`id` bigint unsigned not null auto_increment primary key, `first_name` varchar(191) null, `last_name` varchar(191) null, `email` varchar(191) null, `address1` varchar(191) null, `address2` varchar(191) null, `postal_code` varchar(191) null, `city` varchar(191) null, `vat_no` varchar(191) null, `is_dell_partner` tinyint(1) not null, `invoice` text null, `status` varchar(191) null, `account_owner` varchar(191) null, `iban` varchar(191) null, `bank` varchar(191) null, `privacy_policy` tinyint(1) not null default '0', `terms_condition` tinyint(1) not null default '0', `permission_to_contact` tinyint(1) not null, `action_taken_by` int null, `disapprove_reason` text null, `created_at` timestamp null, `updated_at` timestamp null, `deleted_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
