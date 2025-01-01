const puppeteer = require('puppeteer');

(async () => {
    const url = process.argv[2]; // Récupère l'URL depuis les arguments
    if (!url) {
        console.error('URL manquante');
        process.exit(1);
    }

    const browser = await puppeteer.launch();
    const page = await browser.newPage();

    // Tableau pour stocker les URLs des requêtes
    const requests = [];

    // Intercepte les requêtes réseau
    page.on('request', (request) => {
        requests.push(request.url());
    });

    await page.goto(url, { waitUntil: 'load', timeout: 60000 }); // Charge la page
    await browser.close();

    console.log(JSON.stringify(requests)); // Retourne les URLs des requêtes
})();
