# http://spyne.io/#inprot=Soap11&outprot=Soap11&s=rpc&tpt=WsgiApplication&validator=true

import logging
logging.basicConfig(level=logging.DEBUG)
from spyne import Application, rpc, ServiceBase, \
    Integer, Unicode, String
from spyne import Iterable
from spyne.protocol.soap import Soap11
from spyne.server.wsgi import WsgiApplication

class HelloWorldService(ServiceBase):
    @rpc(Integer, Integer, _returns=Unicode)
    def add(ctx,a,b):
        c = a + b
        return "Suma = %d" % c
    
application = Application([HelloWorldService],
    tns='spyne.examples.hello',
    in_protocol=Soap11(),
    out_protocol=Soap11()
)

if __name__ == '__main__':
    from wsgiref.simple_server import make_server
    wsgi_app = WsgiApplication(application)
    server = make_server('127.0.0.1', 5555, wsgi_app)
    server.serve_forever()
