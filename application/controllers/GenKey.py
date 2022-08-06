import getopt
import sys
import logging
import subprocess
from Crypto.PublicKey import RSA

logging.basicConfig(filename='/home/engine/public_html/logs/KeyGen.log', format='%(asctime)s %(message)s', level=logging.DEBUG)


def do_GenerateKeyForFile(fileName):
    filePath = '/nfs-share/'
    keyFilePath = 'key-file/'

    # print('Start: Generating Public And Private Key')
    logging.debug('Start: Generating Public And Private Key')
    newKey = RSA.generate(1024, e=65537)
    private_key = newKey.exportKey("PEM")
    public_key = newKey.publickey().exportKey("PEM")
    # print('Done: Generating Public And Private Key --')
    logging.debug('Done: Generating Public And Private Key')

    # print('Start: Writing Private Key To File')
    logging.debug('Start: Writing Private Key To File')
    # print(private_key)
    # logging.debug(private_key)
    fd = open(filePath + keyFilePath + "priv" + fileName + ".pem", "wb")
    fd.write(private_key)
    fd.close()
    # print('Done: Writing Private Key To File')
    logging.debug('Done: Writing Private Key To File')

    # print('Start: Writing Public Key To File')
    logging.debug('Start: Writing Public Key To File')
    # print(public_key)
    # logging.debug(public_key)
    fd = open(filePath + keyFilePath + "pub" + fileName + ".pem", "wb")
    fd.write(public_key)
    fd.close()
    # print('Done: Writing Public Key To File')
    logging.debug('Done: Writing Public Key To File')
    return 'done'

def do_RemoveKeyForFile(fileName):
    filePath = '/nfs-share/'
    keyFilePath = 'key-file/'
    logging.debug('Start: Deleting Private Key File')
    shl = subprocess.Popen("rm " + filePath + keyFilePath + "priv" + fileName + ".pem", shell=True,
                               stdout=subprocess.PIPE)
    stdout = shl.communicate()
    logging.debug('Done: Deleting Private Key File')
    logging.debug('Start: Deleting Public Key File')
    shl = subprocess.Popen("rm " + filePath + keyFilePath + "pub" + fileName + ".pem", shell=True,
                               stdout=subprocess.PIPE)
    stdout = shl.communicate()
    logging.debug('Done: Deleting Public Key File')
    return 'done'


def main(argv):
    fname = ''
    mode = ''

    try:
        opts, args = getopt.getopt(argv, "hn:m:", ["fname", "mode"])
    except getopt.GetoptError:
        print('GenKey.py -n <filename> -m <mode>')
        sys.exit(2)
    if len(opts) == 0:
        print('GenKey.py -n <filename> -m <mode>')
        sys.exit(2)
    else:
        for opt, arg in opts:
            if opt == '-h':
                print('GenKey.py -n <filename> -m <mode>')
                sys.exit()
            elif opt in ("-n", "--fname"):
                fname = arg
            elif opt in ("-m", "--mode"):
                mode = arg

        if not fname:
            print('You must specify filename with -n option')
            sys.exit(2)

        if not mode:
            print('You must specify mode with -m option')
            sys.exit(2)

        # print('='+mode+'=')

        # s = xmlrpc.client.ServerProxy('http://' + serverip + ':8000')
        if mode == 'add':
            print(do_GenerateKeyForFile(fname))
        elif mode == 'del':
            print(do_RemoveKeyForFile(fname))
        else:
            print('You must enter valid mode [add|del] in -m option')
            sys.exit(2)


if __name__ == "__main__":
    main(sys.argv[1:])