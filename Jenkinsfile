pipeline {
    agent any
    stages {
        stage('Checkout') {
            steps {
                     git branch: 'main', url: 'https://github.com/Joseph-KJ/jenkinsstudy.git'
            }
        }
        stage('Deploy to Web Server') {
            steps {
                sshagent(['0ff32528-117d-4d50-8a9c-e4b1ab0f1be4']) {
                sh '''
    ssh -o StrictHostKeyChecking=no user@webserver "cd /home/ubuntu/employee-management/ && git pull origin main && docker-compose up -d --build"
    '''
                }
            }
        }
    }
}
