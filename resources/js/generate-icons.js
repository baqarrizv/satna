const sharp = require('sharp');
const fs = require('fs');

// Define the sizes for icons and splash screens
const sizes = {
  icons: [
    { width: 72, height: 72, fileName: 'icon-72x72.png' },
    { width: 96, height: 96, fileName: 'icon-96x96.png' },
    { width: 128, height: 128, fileName: 'icon-128x128.png' },
    { width: 144, height: 144, fileName: 'icon-144x144.png' },
    { width: 152, height: 152, fileName: 'icon-152x152.png' },
    { width: 192, height: 192, fileName: 'icon-192x192.png' },
    { width: 384, height: 384, fileName: 'icon-384x384.png' },
    { width: 512, height: 512, fileName: 'icon-512x512.png' },
  ],
  splashScreens: [
    { width: 640, height: 1136, fileName: 'splash-640x1136.png' },
    { width: 750, height: 1334, fileName: 'splash-750x1334.png' },
    { width: 828, height: 1792, fileName: 'splash-828x1792.png' },
    { width: 1125, height: 2436, fileName: 'splash-1125x2436.png' },
    { width: 1242, height: 2208, fileName: 'splash-1242x2208.png' },
    { width: 1242, height: 2688, fileName: 'splash-1242x2688.png' },
    { width: 1536, height: 2048, fileName: 'splash-1536x2048.png' },
    { width: 1668, height: 2224, fileName: 'splash-1668x2224.png' },
    { width: 1668, height: 2388, fileName: 'splash-1668x2388.png' },
    { width: 2048, height: 2732, fileName: 'splash-2048x2732.png' },
  ]
};

// Path to the uploaded logo
const inputLogo = 'storage/settings/4567ag6ecw48SWVRIHMPQxWIFfqPAAFzbNSZp9Jj.png'; // Replace with your uploaded logo path

// Create output directories if they don't exist
const outputIconDir = 'images/icons';
const outputSplashDir = 'images/splash';

if (!fs.existsSync(outputIconDir)) {
  fs.mkdirSync(outputIconDir, { recursive: true });
}

if (!fs.existsSync(outputSplashDir)) {
  fs.mkdirSync(outputSplashDir, { recursive: true });
}

// Generate icons
sizes.icons.forEach(size => {
  sharp(inputLogo)
    .resize(size.width, size.height)
    .toFile(`${outputIconDir}/${size.fileName}`, (err, info) => {
      if (err) console.error('Error generating icon:', err);
      else console.log('Icon generated:', `${outputIconDir}/${size.fileName}`); // Corrected log path
    });
});

// Generate splash screens
sizes.splashScreens.forEach(size => {
  sharp(inputLogo)
    .resize(size.width, size.height, { fit: 'cover' }) // Adjust the fit as needed
    .toFile(`${outputSplashDir}/${size.fileName}`, (err, info) => {
      if (err) console.error('Error generating splash screen:', err);
      else console.log('Splash screen generated:', `${outputSplashDir}/${size.fileName}`);
    });
});
