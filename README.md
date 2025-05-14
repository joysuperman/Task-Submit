# Latest Insights Block

## Overview
The Latest Insights block displays a customizable grid of recent posts with pagination support and popup functionality for viewing post content without leaving the page.

## Features
- Configurable grid layout with responsive columns (1-4 columns)
- Post filtering by post type and selection criteria
- Pagination support for both mobile and desktop views
- Interactive popup to display post content
- Customizable appearance and styling

## ACF Fields
The block uses Advanced Custom Fields with the following configuration options:

- **Title** - Section title displayed above the posts grid
- **Post Type** - Select which post types to display
- **Selection Type** - Choose between recent posts, featured posts, or custom selection
- **Number of Posts** - Control how many posts appear per page
- **Columns** - Set the number of columns in the grid (1-4)
- **Show Pagination** - Toggle pagination on/off

## Popup Functionality
The block includes a popup feature that:
- Displays post content when a post item is clicked
- Fetches content via AJAX to maintain performance
- Provides a loading indicator during content retrieval
- Can be closed via a close button, clicking outside, or pressing ESC

## Usage
1. Add the Latest Insights block to any page using the WordPress block editor
2. Configure the block settings in the sidebar
3. Preview and adjust as needed

## Development Notes
- The block uses jQuery for DOM manipulation and AJAX requests
- AJAX calls are secured with WordPress nonces
- The block is fully responsive with mobile-specific adjustments
- Custom styling can be applied through the block's class names





# CTA Banner Block

## Overview

The CTA Banner block creates an attention-grabbing call-to-action section with customizable content, buttons, and styling options.

## Features

-   Configurable section title, main title, and description text
-   Primary and secondary button options with customizable text and links
-   Background color selection
-   Optional background image with overlay
-   Responsive design for all screen sizes


## ACF Fields

The block uses Advanced Custom Fields with the following configuration options:

-   **Section Title** - Optional title displayed above the banner (default: "OTC Market Report")
-   **Title** - Main banner heading (default: "Key Trends In OTC Markets")
-   **Description** - Descriptive text explaining the banner purpose
-   **Primary Button**
    -   Text (default: "Explore Insights")
    -   Link URL (default: "/insights")
-   **Secondary Button**
    -   Text (default: "Get Full Report")
    -   Link URL (default: "/reports/otc-market")
-   **Background Color** - Color picker for the banner background (default: "#f8f8f8")
-   **Background Image** - Optional image to display behind the banner content

## Styling

The banner includes several styling features:

-   Background image overlay with semi-transparent dark background
-   Responsive layout that adjusts for different screen sizes
-   Proper spacing and alignment of all elements
-   Hover effects for buttons

## Usage

1. Add the CTA Banner block to any page using the WordPress block editor
2. Configure the block settings in the sidebar
3. Preview and adjust as needed

## Development Notes

-   The block uses a container with max-width for proper content alignment
-   Background images include an overlay for better text readability
-   The banner is fully responsive with mobile-specific adjustments
-   Custom styling can be applied through the block's class names
