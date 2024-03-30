# Laravel Blog Application

This is a Laravel-based blog application that allows users to register, login, create, read, update, and delete blog posts, comment on posts, view user profiles, and integrate with external APIs to fetch data. The application is styled using CSS and is responsive for optimal user experience across different devices.

## User Management

Implemented user authentication and profile management features.

- Users can register for an account, log in, and log out securely.
- Provided functionalities for users to edit their profile information.
- Ensured a seamless user experience with login, register, logout, and profile edit features.

## Setup and Basic Routing

- Initialised a new Laravel project.
- Created routes for all related modules such as user login, registration, and blog post. (Refer to: `routes/web.php`)
- Implemented a route group for authenticated users with middleware.

## Integration with TMDB API

Integrated TMDB API to search for movies.

- Created a feature to search for movies using TMDB API.
- Users can input search parameters like movie titles.
- Displayed search results in an easy-to-read format.

## Blog Posts

Implemented functionality for users to create, edit, and delete blog posts.

- Users can create posts by providing a title, image, and content.
- Implemented features for users to edit and delete their own posts.
- Users can leave comments on posts, fostering engagement and interaction.
- Developed a dashboard displaying recent posts for easy access and navigation.

## Styling and UI

Utilized the BootstrapLimitless responsive web application kit for styling the application.

- Incorporated the BootstrapLimitless kit for a modern and responsive user interface.
- Ensured compatibility across various devices for an optimal user experience.
- Leveraged the features and components provided by BootstrapLimitless to enhance the visual appeal and usability of the application.

For more details and to access the BootstrapLimitless kit, visit: [BootstrapLimitless - Responsive Web Application Kit](https://themeforest.net/item/limitless-responsive-web-application-kit/13080328)
## Added Features

1. Analytics Dashboard

- Total Users: Displays the total number of registered users.
- Total Posts: Shows the overall count of blog posts.
- Total Comments: Tracks the total number of comments on blog entries.
- User Engagement Score: Calculates a comprehensive engagement score based on various user interactions, including views, likes, shares, and comments.

2. Author List Table

- Author Name: Displays the name of each author.
- Email Address: Shows the email address associated with each author.
- Join Date: Indicates the date when each author joined the platform.
