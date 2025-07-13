# MS Gallery for Divi Lite

A lightweight WordPress plugin that adds a responsive masonry gallery module to the Divi Builder. Create beautiful, Pinterest-style image galleries with ease.

## 🚀 Features

- **Masonry Layout**: Pinterest-style responsive gallery with varying image heights
- **Divi Builder Integration**: Seamlessly integrates with Divi's visual builder
- **Responsive Design**: Automatically adapts to different screen sizes
- **Customizable Grid**: Control columns (1-5) and gaps between images
- **Image Size Options**: Choose from WordPress standard image sizes
- **Hover Effects**: Smooth scale and shadow effects on image hover
- **Advanced Styling**: Border controls and custom CSS properties
- **Performance Optimized**: Lightweight and fast loading

## 📋 Requirements

- WordPress 5.0 or higher
- PHP 7.2 or higher
- Divi Theme or Divi Builder plugin
- Node.js and npm (for development)

## 🛠️ Installation

### For Users

1. Upload the plugin folder to `/wp-content/plugins/`
2. Activate the plugin through WordPress admin
3. Use the "Ms Gallery" module in Divi Builder

### For Developers

1. Clone the repository
2. Install dependencies:
   ```bash
   npm install
   ```
3. Build the plugin:
   ```bash
   npm run build
   ```

## 🎯 Usage

### Adding a Gallery

1. Open Divi Builder on any page
2. Add a new module and search for "Ms Gallery"
3. Click to add the module to your page

### Configuring the Gallery

#### General Settings
- **Choose Images**: Select images from WordPress Media Library
- **Image Size**: Choose from thumbnail, medium, large, or full size
- **Gallery Style**: Currently supports masonry layout
- **Grid Column**: Set number of columns (1-5)
- **Column Gap**: Adjust horizontal spacing between images
- **Row Gap**: Adjust vertical spacing between images

#### Advanced Settings
- **Image Style**: Customize borders, border radius, and styling for gallery items

## 🏗️ Architecture

The plugin follows a modular architecture:

```
ms-gallery-for-divi-lite/
├── includes/
│   ├── MsGalleryForDivi.php          # Main extension class
│   ├── modules/
│   │   └── MsGallery/
│   │       ├── MsGallery.php         # PHP module class
│   │       ├── MsGallery.jsx         # React component
│   │       ├── MsGallery.css         # Styles
│   │       └── mgfdHelper.php        # Helper functions
│   └── fields/                       # Custom field components
├── scripts/                          # Built JavaScript files
├── styles/                           # Built CSS files
└── languages/                        # Translation files
```

### Key Components

- **MGFD_MsGalleryForDivi**: Main extension class that registers with Divi
- **MGFD_MsGallery**: Divi module class handling backend logic
- **MGFD_Helper**: Helper class with field configurations and styling
- **React Component**: Frontend rendering with hover effects

## 🎨 Styling

The gallery uses CSS custom properties for dynamic styling:

```css
:root {
    --mgfd-grid_column: 4;
    --mgfd-grid-horizontal-gap: 10px;
    --mgfd-grid-vertical-gap: 10px;
    --mgfd-masonry-horizontal-gap: 0;
    --mgfd-masonry-vertical-gap: 0;
}
```

### Responsive Breakpoints

- **Desktop**: Up to 5 columns
- **Tablet (910px)**: 3 columns
- **Mobile (768px)**: 2 columns
- **Small Mobile (575px)**: 1 column

## 🔧 Development

### Building

```bash
# Development build with hot reload
npm start

# Production build
npm run build

# Create distribution zip
npm run zip
```

### File Structure

- **PHP Files**: Handle WordPress integration and Divi module registration
- **React Components**: Frontend rendering and Visual Builder support
- **CSS**: Styling with CSS custom properties for dynamic theming
- **Helper Classes**: Field configurations and utility functions

### Adding New Features

1. **New Gallery Styles**: Add options to `get_settings_fields()` in `mgfdHelper.php`
2. **Custom Fields**: Create new field components in `includes/fields/`
3. **Styling**: Update CSS variables and responsive breakpoints
4. **Functionality**: Extend helper methods in `mgfdHelper.php`

## 📦 Dependencies

- **divi-scripts**: Build tool for Divi extensions
- **React**: Frontend component library
- **WordPress**: Core platform integration

## 🐛 Troubleshooting

### Common Issues

1. **Module not appearing**: Ensure Divi theme/builder is active
2. **Images not loading**: Check WordPress Media Library permissions
3. **Styling issues**: Clear cache and rebuild with `npm run build`

### Debug Mode

Enable WordPress debug mode to see detailed error messages:

```php
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
```

## 📄 License

This plugin is licensed under the GPL v2 or later.

## 👨‍💻 Author

**Mandeep Singh**

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Test thoroughly
5. Submit a pull request

## 📞 Support

For support and feature requests, please contact the developer or create an issue in the repository.

---

**Version**: 1.0.1  
**Last Updated**: 13-07-2025 
**Compatibility**: WordPress 5.0+, Divi 4.0+ 