import { defineConfig } from 'cypress'

export default defineConfig({
    
    chromeWebSecurity: false,
    retries: 2,
    defaultCommandTimeout: 5000,
    watchForFileChanges: false,
    videosFolder: 'tests/cypress/videos',
    screenshotsFolder: 'tests/cypress/screenshots',
    fixturesFolder: 'tests/cypress/fixture',
    e2e: {

        setupNodeEvents(on, config) {
           
            on('task', {
                log(message) {
                  console.log(message)
        
                  return null
                },
            });
            
        },
        baseUrl: 'http://127.0.0.1:8000',
        specPattern: 'tests/cypress/integration/**/*.cy.{js,jsx,ts,tsx}',
        supportFile: 'tests/cypress/support/index.js',
    },
})
