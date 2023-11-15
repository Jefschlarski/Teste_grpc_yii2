#!/bin/bash

# Verifica se o script está sendo executado como root
if [ "$EUID" -ne 0 ]; then
  echo "Este script precisa ser executado como root. Use sudo."
  exit 1
fi

# Atualiza a lista de pacotes
apt update

#Instala o git
apt-get install git
#atualiza e upa os pacotes
sudo apt update && sudo apt upgrade
#instala o snap
apt install snapd
#instala o vscode
snap install code --classic
#instala o postman
snap install postman
# Mensagem de conclusão
    
echo "Instalação concluída com sucesso."