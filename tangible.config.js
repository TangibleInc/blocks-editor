export default {
  build: [
    // Admin
    {
      src: 'assets/src/admin.scss',
      dest: 'assets/build/admin.min.css'
    },
  ],
  format: [
  ],
  archive: {
    root: 'tangible-blocks-editor',
    dest: 'publish/tangible-blocks-editor.zip',
    src: [
      '*.php',
      'assets/**',
      'includes/**',
      'vendor/tangible/**',
      'readme.txt'
    ],
    exclude: [
      'assets/src',
      'docs',
      '**/tests',
      '**/*.scss',
      '**/*.jsx',
      '**/*.ts',
      '**/*.tsx',
      'vendor/tangible/*/vendor',
      'vendor/tangible/blocks',
      'vendor/tangible/fields',
      'vendor/tangible/template-system',
      'vendor/tangible-dev/'
    ],
  },
  /**
   * Dependencies for production are installed in `vendor/tangible`,
   * included in the zip package to publish. Those for development are
   * in `tangible-dev`, excluded from the archive.
   * 
   * In `.wp-env.json`, these folders are mounted to the virtual file
   * system for local development and testing.
   */
  install: [
    {
      git: 'git@github.com:tangibleinc/blocks',
      dest: 'vendor/tangible-dev/blocks',
      branch: 'main',
    },
    {
      git: 'git@github.com:tangibleinc/fields',
      dest: 'vendor/tangible/fields',
      branch: 'main',
    },
    {
      git: 'git@github.com:tangibleinc/framework',
      dest: 'vendor/tangible/framework',
      branch: 'main',
    },
    {
      git: 'git@github.com:tangibleinc/template-system',
      dest: 'vendor/tangible/template-system',
      branch: 'main',
    },
    {
      git: 'git@github.com:tangibleinc/updater',
      dest: 'vendor/tangible/updater',
      branch: 'main',
    },
  ],
  installDev: [
  ]
}
