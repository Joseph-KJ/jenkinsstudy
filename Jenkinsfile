pipeline {
    agent any

    environment {
        DEPLOY_SERVER = "ubuntu@<DEPLOYMENT_SERVER_IP>"
        PROJECT_DIR = "/home/ubuntu/employee-management1"
    }

    stages {
        stage('Checkout Code') {
            steps {
                    checkout scmGit(branches: [[name: 'main']], 
                                    userRemoteConfigs: [[
                                        url: 'https://github.com/Joseph-KJ/jenkinsstudy.git',
                                        credentialsId: '0ff32528-117d-4d50-8a9c-e4b1ab0f1be4'
                                    ]])
            }
        }

        stage('Build Docker Images') {
            steps {
                sh 'docker-compose build'
            }
        }

        stage('Deploy to Server') {
            steps {
                sshagent(['0ff32528-117d-4d50-8a9c-e4b1ab0f1be4']) {
                    sh """
                        ssh -o StrictHostKeyChecking=no $DEPLOY_SERVER << EOF
                        cd $PROJECT_DIR
                        git pull origin main
                        docker-compose down
                        docker-compose up -d --build
                        EOF
                    """
                }
            }
        }
    }
}
