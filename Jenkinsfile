pipeline {
    agent any
    stages {
        stage('Checkout') {
            steps {
                git branch: 'main', url: 'https://github.com/zakkyanurhadi/belajar-jenkins14.git'
            }
        }
        stage('Install PHP & Composer') {
            steps {
                script {
                    sh '''
                        apt-get update
                        apt-get install -y php-cli curl unzip
                        
                        # Install Composer
                        curl -sS https://getcomposer.org/installer | php
                        mv composer.phar /usr/local/bin/composer
                        chmod +x /usr/local/bin/composer
                    '''
                }
            }
        }
        stage('Composer Install') {
            steps {
                sh 'composer install --no-interaction --prefer-dist'
            }
        }
        stage('Run PHPUnit Tests') {
            steps {
                sh './vendor/bin/phpunit tests'
            }
        }
        stage('Run PHP') {
            steps {
                sh 'php index.php'
            }
        }
    }
}