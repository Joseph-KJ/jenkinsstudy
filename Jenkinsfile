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
                    ssh -o StrictHostKeyChecking=no ubuntu@3.111.36.100 "cd /home/ubuntu/employee-management && docker-compose pull && docker-compose up -d"
                    '''
                }
            }
        }
    }
}
