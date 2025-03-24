<?php 
error_reporting(E_ALL);
ini_set('display_errors', '0');

/**
 * config.php
 * This file stores configuration settings for the project, including API endpoints,
 * AWS configurations, and other reusable constants.
 */

// $base_url = "https://7gv0oagg0c.execute-api.us-east-1.amazonaws.com/dev/";
define('BASE_URL', 'http://da.careerreadinessinventory.academy/');
define('STANDARD_RECOMMENDATIONS_URL', "https://cri-organization-logos.s3.us-east-1.amazonaws.com/4d3b386f-66fb-4577-a7b7-5d9ba8c423c0/recommendation.json");

// API Endpoints
define('API_BASE_URL', 'https://ged4f9bmkk.execute-api.us-east-1.amazonaws.com/dev/');
define('API_STUDENT_FILTERS_ENDPOINT', API_BASE_URL . '/student-filters');
define('API_STUDENT_DETAILS_ENDPOINT', API_BASE_URL . '/student-details');
define('API_STUDENT_COMPETENCY_ENDPOINT', API_BASE_URL . '/student-competency');
define('API_CUSTOM_RECOMMENDATIONS_ENDPOINT', API_BASE_URL . '/get-organization-records');

// AWS Configuration
// define('AWS_REGION', 'us-west-2');
// define('AWS_BUCKET_NAME', 'your-s3-bucket-name');
// define('AWS_CDN_URL', 'https://your-cloudfront-url.cloudfront.net');

// Environment Variables
define('ENV', 'production'); // Change to 'development' for local testing
define('DEBUG', false);      // Set to true to enable error reporting in dev mode

// Frontend Specific Settings
define('FRONTEND_THEME', 'light'); // Can be 'light' or 'dark'
define('DEFAULT_LANGUAGE', 'en');  // Default language for the UI

// API Keys (if any, avoid hardcoding sensitive keys here for production)
define('GOOGLE_ANALYTICS_ID', 'G-KN2V1VKJZ9');

// Caching Settings
define('CACHE_LIFETIME', 3600); // Cache duration in seconds

// Security Settings
define('ENABLE_CSRF_PROTECTION', true);
define('CSP_POLICY', "default-src 'self' https://your-api-gateway-url.amazonaws.com;");

// Utility Settings (for debugging or logging)
define('LOG_FILE_PATH', __DIR__ . '/logs/app.log');
?>