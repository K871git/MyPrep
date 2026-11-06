CREATE TABLE `users` (
    `id` int NOT NULL AUTO_INCREMENT,
    `name` varchar(100) NOT NULL,
    `email` varchar(150) NOT NULL,
    `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `email` (`email`)
) ENGINE = InnoDB AUTO_INCREMENT = 3 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;

CREATE TABLE `applist` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `app_name` VARCHAR(150) NOT NULL,
    `package_name` VARCHAR(255) NOT NULL,
    `version` VARCHAR(50) DEFAULT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `unique_package_name` (`package_name`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;

CREATE TABLE `devices` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `user_id` INT NOT NULL,
    `device_name` VARCHAR(150) NOT NULL,
    `device_type` ENUM(
        'Android',
        'iOS',
        'Windows',
        'Other'
    ) DEFAULT 'Android',
    `device_identifier` VARCHAR(255) DEFAULT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `unique_device_identifier` (`device_identifier`),
    KEY `idx_devices_user_id` (`user_id`),
    CONSTRAINT `fk_devices_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;

CREATE TABLE `appData` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `device_id` INT NOT NULL,
    `app_id` INT NOT NULL,
    `installed_version` VARCHAR(50) DEFAULT NULL,
    `installed_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `unique_device_app` (`device_id`, `app_id`),
    KEY `idx_appdata_app_id` (`app_id`),
    CONSTRAINT `fk_appdata_device` FOREIGN KEY (`device_id`) REFERENCES `devices` (`id`) ON DELETE CASCADE,
    CONSTRAINT `fk_appdata_app` FOREIGN KEY (`app_id`) REFERENCES `applist` (`id`) ON DELETE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;

INSERT INTO
    `users` (`name`, `email`)
VALUES (
        'Rahul Sharma',
        'rahul@example.com'
    ),
    (
        'Priya Patel',
        'priya@example.com'
    )

INSERT INTO
    `applist` (
        `app_name`,
        `package_name`,
        `version`
    )
VALUES (
        'WhatsApp',
        'com.whatsapp',
        '2.26.1'
    ),
    (
        'Instagram',
        'com.instagram.android',
        '410.0'
    ),
    (
        'YouTube',
        'com.google.android.youtube',
        '21.10'
    ),
    (
        'Google Maps',
        'com.google.android.apps.maps',
        '26.0'
    ),
    (
        'Spotify',
        'com.spotify.music',
        '9.1'
    );

INSERT INTO
    `devices` (
        `user_id`,
        `device_name`,
        `device_type`,
        `device_identifier`
    )
VALUES (
        1,
        'Samsung Galaxy S24',
        'Android',
        'DEVICE-001'
    ),
    (
        1,
        'iPhone 15',
        'iOS',
        'DEVICE-002'
    ),
    (
        2,
        'Google Pixel 9',
        'Android',
        'DEVICE-003'
    );

INSERT INTO
    `appData` (
        `device_id`,
        `app_id`,
        `installed_version`
    )
VALUES (1, 1, '2.26.1'), -- WhatsApp on Samsung
    (1, 2, '410.0'), -- Instagram on Samsung
    (1, 3, '21.10'), -- YouTube on Samsung
    (1, 4, '26.0'), -- Google Maps on Samsung
    (2, 1, '2.26.1'), -- WhatsApp on iPhone
    (2, 2, '410.0'), -- Instagram on iPhone
    (3, 1, '2.26.1'), -- WhatsApp on Pixel
    (3, 3, '21.10'), -- YouTube on Pixel
    (3, 5, '9.1');
-- Spotify on Pixel