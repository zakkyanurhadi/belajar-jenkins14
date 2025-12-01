pipeline {
    agent any
    stages {
        stage('Checkout') {
            steps {
                git branch: 'main', url: 'https://github.com/zakkyanurhadi/belajar-jenkins14.git'
            }
        }
        stage('Composer Install') {
            steps {
                sh 'composer install --no-interaction --prefer-dist'
            }
        }
        stage('Run PHPUnit Tests') {
            steps {
                sh './vendor/bin/phpunit tests --testdox --colors=never'
            }
        }
        stage('Run PHP') {
            steps {
                sh 'php index.php'
            }
        }
    }
}